<?php declare(strict_types=1);


namespace SpotifyApiConnectTest\Integration\Application\SpotifyWebApiPhp;


use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApi;
use SpotifyApiConnect\Domain\DataTransferObject\DeleteTrackInfoDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\TrackSearchRequestDataProvider;
use SpotifyApiConnect\Domain\Exception\PlaylistNotFound;
use SpotifyApiConnect\SpotifyApiConnectFactory;
use SpotifyWebAPI\SpotifyWebAPIException;

class SpotifyWebApiTest extends TestCase
{
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

    private const spotifySongInit = [
        'artist' => 'U2',
        'track' => 'I Still Haven\'t Found What I\'m Looking For',
        'trackId' => '6wpGqhRvJGNNXwWlPmkMyO'
    ];


    protected function setUp(): void
    {
        parent::setUp();
        $spotifyApiConnectFactory = new SpotifyApiConnectFactory();
        $spotifyApiAuth = $spotifyApiConnectFactory->createSpotifyApiAuth();
        $accessToken = $spotifyApiAuth->getAccessByRefreshToken($_ENV['REFRESH_TOKEN']);
        $this->spotifyWebApi = $spotifyApiConnectFactory->createSpotifyWebApi($accessToken);
    }


    public function testGetUserPlaylists(): void
    {
        $spotifyPlaylist = $this->spotifyWebApi->getUserPlaylistByName(
            static::spotifyInfo['playlistName']
        );
        $this->assertSame(static::spotifyInfo['playlistId'], $spotifyPlaylist->getId());
    }

    public function testGetUserPlaylistsNotFoundPlayList(): void
    {
        $this->expectException(PlaylistNotFound::class);
        $this->spotifyWebApi->getUserPlaylistByName('uniTest-Not_FOUND-Playlist');
    }

    public function testAddPlaylistTracks()
    {
        $addResult = $this->spotifyWebApi->addPlaylistTracks(
            static::spotifyInfo['playlistId'],
            [
                static::spotifySongInit['trackId']
            ]
        );
        $this->assertTrue($addResult);

        $spotifyPlayList = $this->spotifyWebApi->getPlaylistTracks(
            static::spotifyInfo['playlistId']
        );

        $this->assertNotEmpty($spotifyPlayList->getItems());
        $this->assertNotEmpty($spotifyPlayList->getTotal());
        $this->assertSame(static::spotifySongInit['trackId'], $spotifyPlayList->getItems()[0]->getTrack()->getId());
        $this->assertSame(static::spotifySongInit['artist'], $spotifyPlayList->getItems()[0]->getTrack()->getArtists()[0]->getName());
        $this->assertSame(static::spotifySongInit['track'], $spotifyPlayList->getItems()[0]->getTrack()->getName());
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

    public function testGetPlaylist(): void
    {
        $spotifyPlayList = $this->spotifyWebApi->getPlaylist(
            static::spotifyInfo['playlistId']
        );
        $this->assertSame(static::spotifyInfo['playlistId'], $spotifyPlayList->getId());
        $this->assertSame(static::spotifyInfo['playlistName'], $spotifyPlayList->getName());
        $this->assertTrue($spotifyPlayList->getPublic());
        $this->assertSame(self::spotifySongInit['artist'], $spotifyPlayList->getTracks()->getItems()[0]->getTrack()->getArtists()[0]->getName());
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

    public function testSearchTrack()
    {
        $trackSearchRequestDataProvider = new TrackSearchRequestDataProvider();
        $trackSearchRequestDataProvider->setArtist(
            static::spotifySong['artist']
        );
        $trackSearchRequestDataProvider->setTrack(
            static::spotifySong['track']
        );
        $searchResult = $this->spotifyWebApi->searchTrack($trackSearchRequestDataProvider);

        $this->assertGreaterThan(0, $searchResult->getItems());
        $this->assertSame(
            strtolower(static::spotifySong['track']),
            strtolower(
                $searchResult->getItems()[0]->getName()
            )
        );
    }

    public function testSearchTrackNotFound()
    {
        $trackSearchRequestDataProvider = new TrackSearchRequestDataProvider();
        $trackSearchRequestDataProvider->setArtist(
            'NotFOundArtistForUnitTest'
        );
        $trackSearchRequestDataProvider->setTrack(
            'NotFound-Track-For_UNITtest'
        );
        $searchNoResult = $this->spotifyWebApi->searchTrack($trackSearchRequestDataProvider);
        $this->assertSame(0, $searchNoResult->getTotal());
        $this->assertEmpty($searchNoResult->getItems());
    }

    public function testDeleteUserPlaylistTracks()
    {
        $spotifyPlayList = $this->spotifyWebApi->getPlaylistTracks(
            static::spotifyInfo['playlistId']
        );

        $this->assertCount(1, $spotifyPlayList->getItems());
        $this->assertSame(1, $spotifyPlayList->getTotal());

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
            ['id' => 'hahaha']
        );
    }

    public function testDeleteAllSongsInPlaylist()
    {
        $songsIds = include  __DIR__ . '/songs_ids.php';
        $addResult = $this->spotifyWebApi->addPlaylistTracks(
            static::spotifyInfo['playlistId'],
            $songsIds
        );
        $this->assertTrue($addResult);

        $spotifyPlayList = $this->spotifyWebApi->getPlaylistTracks(
            static::spotifyInfo['playlistId']
        );

        $this->assertGreaterThan(210, $spotifyPlayList->getItems());

        $deleteTracks = [];
        foreach ($spotifyPlayList->getItems() as $item) {
            $deleteTrack = new DeleteTrackInfoDataProvider();
            $deleteTrack->setId($item->getTrack()->getId());
            $deleteTracks[] = $deleteTrack;
        }

        $this->spotifyWebApi->deletePlaylistTracks(
            static::spotifyInfo['playlistId'],
            $deleteTracks
        );

        $spotifyPlayList = $this->spotifyWebApi->getPlaylistTracks(
            static::spotifyInfo['playlistId']
        );

        $this->assertCount(0, $spotifyPlayList->getItems());
    }
}
