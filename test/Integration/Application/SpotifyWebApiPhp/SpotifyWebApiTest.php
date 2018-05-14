<?php


namespace SpotifyApiConnectTest\Integration\Application\SpotifyWebApiPhp;


use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\Session;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApi;
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

    protected function setUp()
    {
        parent::setUp();
        if ($this->accessToken === null) {
            $session = new Session(
                getenv('CLIENT_ID'),
                getenv('CLIENT_SECRET'),
                getenv('REDIRECT_URI')
            );
            $session->refreshAccessToken(getenv('REFRESH_TOKEN'));
            $this->accessToken = $session->getAccessToken();
        }

        $this->spotifyWebApi = new SpotifyWebApi();
        $this->spotifyWebApi->setAccessToken($this->accessToken);


    }


    public function testGetUserPlaylists() : void
    {
        $spotifyPlayLists = $this->spotifyWebApi->getUserPlaylists(static::spotifyInfo['user']);
        $playlistId = false;
        $items = (array)$spotifyPlayLists->items;
        foreach ($items as $item) {

            if(trim($item->name) === static::spotifyInfo['playlistName']) {
                $playlistId = $item->id;
                break;
            }
        }

        $this->assertSame(static::spotifyInfo['playlistId'], $playlistId);
        $this->assertTrue($items > 5);
    }

    public function testGetUserPlaylistsNotFoundUser() : void
    {
        $spotifyPlayLists = $this->spotifyWebApi->getUserPlaylists('no-existUser_For-Unit-ttest');
        $this->assertEmpty($spotifyPlayLists->items);
        $this->assertSame(0, $spotifyPlayLists->total);
    }

    public function testGetUserPlaylist() : void
    {
        $spotifyPlayList = $this->spotifyWebApi->getUserPlaylist(
            static::spotifyInfo['user'],
            static::spotifyInfo['playlistId']
        );
        $this->assertTrue(isset($spotifyPlayList->id));
        $this->assertSame(static::spotifyInfo['playlistId'], $spotifyPlayList->id);
    }

    public function testGetNoExistUserPlaylist() : void
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
}