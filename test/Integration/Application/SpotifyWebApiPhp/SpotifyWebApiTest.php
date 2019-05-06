<?php


namespace SpotifyApiConnectTest\Integration\Application\SpotifyWebApiPhp;


use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\Session;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApi;
use SpotifyApiConnect\Domain\DataTransferObject\DeleteTrackInfoDataProvider;
use SpotifyApiConnect\Domain\Exception\PlaylistNotFound;
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

        $this->spotifyWebApi = new SpotifyWebApi(
            $this->accessToken
        );
    }


    public function testGetUserPlaylists(): void
    {
        $spotifyPlaylist = $this->spotifyWebApi->getUserPlaylistByName(
            static::spotifyInfo['user'],
            static::spotifyInfo['playlistName']
        );
        $this->assertSame(static::spotifyInfo['playlistId'], $spotifyPlaylist->getId());
    }

    public function testGetUserPlaylistsNotFoundUser(): void
    {
        $this->expectException(SpotifyWebAPIException::class);
        $this->spotifyWebApi->getUserPlaylistByName('no-existUser_For-Unit-ttest', 'unitPlaylist');
    }

    public function testGetUserPlaylistsNotFoundPlayList(): void
    {
        $this->expectException(PlaylistNotFound::class);
        $this->spotifyWebApi->getUserPlaylistByName(static::spotifyInfo['user'], 'uniTest-Not_FOUND-Playlist');
    }

    public function testGetPlaylist(): void
    {
        $spotifyPlayList = $this->spotifyWebApi->getPlaylist(
            static::spotifyInfo['playlistId']
        );
        $this->assertSame(static::spotifyInfo['playlistId'], $spotifyPlayList->getId());
        $this->assertSame(static::spotifyInfo['playlistName'], $spotifyPlayList->getName());
        $this->assertTrue($spotifyPlayList->getPublic());
        $this->assertSame('U2', $spotifyPlayList->getTracks()->getItems()[0]->getTrack()->getArtists()[0]->getName());
    }

    public function testGetNoExistUserPlaylist(): void
    {
        try {
            $this->spotifyWebApi->getPlaylist(
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

    public function testAddPlaylistTracks()
    {
        $addResult = $this->spotifyWebApi->addPlaylistTracks(
            static::spotifyInfo['playlistId'],
            [
                static::spotifySong['trackId']
            ]
        );
        $this->assertTrue($addResult);

        $spotifyPlayList = $this->spotifyWebApi->getPlaylistTracks(
            static::spotifyInfo['playlistId']
        );

        $this->assertNotEmpty($spotifyPlayList->getItems());
        $this->assertNotEmpty($spotifyPlayList->getTotal());
        $this->assertSame(static::spotifySong['trackId'], $spotifyPlayList->getItems()[1]->getTrack()->getId());
    }

    public function testAddPlaylistTracksNotExistTrackId()
    {
        try {
            $this->spotifyWebApi->addPlaylistTracks(
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
        $spotifyPlayList = $this->spotifyWebApi->getPlaylistTracks(
            static::spotifyInfo['playlistId']
        );

        $this->assertCount(2, $spotifyPlayList->getItems());
        $this->assertSame(2, $spotifyPlayList->getTotal());

        $deleteTrack = new DeleteTrackInfoDataProvider();
        $deleteTrack->setId(static::spotifySong['trackId']);

        $result = $this->spotifyWebApi->deletePlaylistTracks(
            static::spotifyInfo['playlistId'],
            [$deleteTrack]
        );

        $this->assertTrue($result);

        $spotifyPlayList = $this->spotifyWebApi->getPlaylistTracks(
            static::spotifyInfo['playlistId']
        );

        $this->assertCount(1, $spotifyPlayList->getItems());
        $this->assertSame(1, $spotifyPlayList->getTotal());
    }

    public function testDeleteUserPlaylistTracksNoExistId()
    {
        try {
            $deleteTrack = new DeleteTrackInfoDataProvider();
            $deleteTrack->setId('uniTest-Not_FOUND--ID');
            $this->spotifyWebApi->deletePlaylistTracks(
                static::spotifyInfo['playlistId'],
                [$deleteTrack]
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

    public function testDeleteUserPlaylistTracksException()
    {
        $this->expectException(\RuntimeException::class);
        $this->spotifyWebApi->deletePlaylistTracks(
            static::spotifyInfo['playlistId'],
            ['id'=>'hahaha']
        );
    }
}
