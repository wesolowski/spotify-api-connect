<?php


namespace SpotifyApiConnectTest\Integration\Application\SpotifyWebApiPhp;


use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\Session;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApi;
use SpotifyApiConnect\Domain\Model\Config;
use SpotifyWebAPI\SpotifyWebAPIException;

class SpotifyWebApiTest extends TestCase
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var SpotifyWebApi;
     */
    private $spotifyWebApi;

    private const spotifyInfo = [
        'user' => 'fenix0',
        'playlistId' => '5tlDaMgGUWqamYp5JVoNua',
        'playlistName' => 'UnitTest'
    ];

    private const spotifySong = [
        'artist' => 'sting',
        'track' => 'englishman in new york',
        'trackId' => '0k9un4VZY52tvtxNhg6XLo'
    ];

    protected function setUp()
    {
        parent::setUp();
        if ($this->accessToken === null) {
            $config = new Config(
                getenv('CLIENT_ID'),
                getenv('CLIENT_SECRET'),
                getenv('REDIRECT_URI')
            );
            $session = new Session(
                $config
            );
            $session->refreshAccessToken(getenv('REFRESH_TOKEN'));
            $this->accessToken = $session->getAccessToken();
        }

        $this->spotifyWebApi = new SpotifyWebApi();
        $this->spotifyWebApi->setAccessToken($this->accessToken);


    }


    public function testGetUserPlaylists(): void
    {
        $spotifyPlayLists = $this->spotifyWebApi->getUserPlaylists(static::spotifyInfo['user']);
        $playlistId = false;
        $items = (array)$spotifyPlayLists->items;
        foreach ($items as $item) {

            if (trim($item->name) === static::spotifyInfo['playlistName']) {
                $playlistId = $item->id;
                break;
            }
        }

        $this->assertSame(static::spotifyInfo['playlistId'], $playlistId);
        $this->assertTrue($items > 5);
    }

    public function testGetUserPlaylistsNotFoundUser(): void
    {
        $this->expectException(SpotifyWebAPIException::class);
        $spotifyPlayLists = $this->spotifyWebApi->getUserPlaylists('no-existUser_For-Unit-ttest');
        $this->assertEmpty($spotifyPlayLists->items);
        $this->assertSame(0, $spotifyPlayLists->total);
    }

    public function testGetUserPlaylist(): void
    {
        $spotifyPlayList = $this->spotifyWebApi->getUserPlaylist(
            static::spotifyInfo['user'],
            static::spotifyInfo['playlistId']
        );
        $this->assertTrue(isset($spotifyPlayList->id));
        $this->assertSame(static::spotifyInfo['playlistId'], $spotifyPlayList->id);
    }

    public function testGetNoExistUserPlaylist(): void
    {
        try {
            $this->spotifyWebApi->getUserPlaylist(
                static::spotifyInfo['user'],
                'no-exist-PlAyList'
            );
        } catch (SpotifyWebAPIException $e) {
            $this->assertSame(
                'Invalid playlist Id',
                trim($e->getMessage())
            );
            return;
        }
        $this->fail();
    }

    public function testSearch()
    {
        $searchResult = $this->spotifyWebApi->search(
            sprintf('track:%s artist:%s', static::spotifySong['track'], static::spotifySong['artist']), ['track']
        );

        $this->assertSame(strtolower(static::spotifySong['track']), strtolower($searchResult->tracks->items[0]->name));
    }

    public function testSearchNotFound()
    {
        $searchNoResult = $this->spotifyWebApi->search(
            sprintf('track:%s artist:%s', 'NotFound-Track-For_UNITtest', 'NotFOundArtistForUnitTest'), ['track']
        );
        $this->assertSame(0, $searchNoResult->tracks->total);
        $this->assertEmpty($searchNoResult->tracks->items);
    }

    public function testAddUserPlaylistTracks()
    {
        $addResult = $this->spotifyWebApi->addUserPlaylistTracks(
            static::spotifyInfo['user'],
            static::spotifyInfo['playlistId'],
            [
                static::spotifySong['trackId']
            ]
        );
        $this->assertTrue($addResult);

        $spotifyPlayList = $this->spotifyWebApi->getUserPlaylistTracks(
            static::spotifyInfo['user'],
            static::spotifyInfo['playlistId']
        );

        $this->assertSame(static::spotifySong['trackId'], $spotifyPlayList->items[0]->track->id);
    }

    public function testAddUserPlaylistTracksNotExistTrackId()
    {
        try {
            $this->spotifyWebApi->addUserPlaylistTracks(
                static::spotifyInfo['user'],
                static::spotifyInfo['playlistId'],
                [
                    'uniTest-Not_FOUND--ID'
                ]
            );
        } catch (\SpotifyWebAPI\SpotifyWebAPIException $e) {
            $this->assertSame(
                'Invalid track uri: spotify:track:uniTest-Not_FOUND--ID',
                $e->getMessage()
            );
            return;
        }

        $this->fail();
    }

    public function testDeleteUserPlaylistTracks()
    {
        $deleteResult = $this->spotifyWebApi->deleteUserPlaylistTracks(
            static::spotifyInfo['user'],
            static::spotifyInfo['playlistId'],
            [
                [
                    'id' => static::spotifySong['trackId']
                ]
            ]
        );
        $this->assertNotEmpty($deleteResult);
        $spotifyPlayList = $this->spotifyWebApi->getUserPlaylistTracks(
            static::spotifyInfo['user'],
            static::spotifyInfo['playlistId']
        );

        $this->assertEmpty($spotifyPlayList->items);
    }

    public function testDeleteUserPlaylistTracksNoExistId()
    {
        try {
            $this->spotifyWebApi->deleteUserPlaylistTracks(
                static::spotifyInfo['user'],
                static::spotifyInfo['playlistId'],
                [
                    [
                        'id' => 'uniTest-Not_FOUND--ID'
                    ]
                ]
            );
        } catch (\SpotifyWebAPI\SpotifyWebAPIException $e) {
            $this->assertSame(
                'JSON body contains an invalid track uri: spotify:track:uniTest-Not_FOUND--ID',
                $e->getMessage()
            );
            return;
        }

        $this->fail();
    }
}
