<?php declare(strict_types=1);


namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

use SpotifyApiConnect\Domain\DataTransferObject\DeleteTrackInfoDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\PlaylistDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider;
use SpotifyWebAPI\SpotifyWebAPI as BaseSpotifyWebAPI;
use SpotifyWebAPI\Request;

class SpotifyWebApi implements SpotifyWebApiInterface
{
    /**
     * @var BaseSpotifyWebAPI
     */
    private $baseSpotifyWebAPI;

    /**
     * @param string $accessToken
     */
    public function __construct(string $accessToken)
    {
        $this->baseSpotifyWebAPI = new BaseSpotifyWebAPI();
        $this->baseSpotifyWebAPI->setAccessToken($accessToken);
    }

    /**
     * @param $playlistId
     * @param array $tracks
     * @param array $options
     * @return bool
     */
    public function addPlaylistTracks($playlistId, array $tracks, array $options = []): bool
    {
        return $this->baseSpotifyWebAPI->addPlaylistTracks($playlistId, $tracks, $options);
    }

    /**
     * @param string $playlistId
     * @param DeleteTrackInfoDataProvider[] $tracksInfo
     * @return bool
     */
    public function deletePlaylistTracks(string $playlistId, array $tracksInfo): bool
    {
        $tracksToDelete = [];
        foreach ($tracksInfo as $deleteTrackInfoDataProvider) {
            if(! $deleteTrackInfoDataProvider instanceof DeleteTrackInfoDataProvider) {
                throw new \RuntimeException(
                    sprintf('tracksInfo should be instanceof class: %s', DeleteTrackInfoDataProvider::class)
                );
            }
            $tracksToDelete[] = $deleteTrackInfoDataProvider->toArray();
        }
        return (bool)$this->baseSpotifyWebAPI->deletePlaylistTracks($playlistId, $tracksToDelete);
    }

    /**
     * @param string $playlistId
     * @param array $options
     * @return PlaylistDataProvider
     */
    public function getPlaylist(string $playlistId, array $options = []): PlaylistDataProvider
    {
        $this->baseSpotifyWebAPI->setReturnType(Request::RETURN_ASSOC);
        $jsonObjectResult = $this->baseSpotifyWebAPI->getPlaylist($playlistId, $options);
        $this->baseSpotifyWebAPI->setReturnType(Request::RETURN_OBJECT);

        $playlistDataProvider = new PlaylistDataProvider();
        $playlistDataProvider->fromArray($jsonObjectResult);

        return $playlistDataProvider;

    }

    /**
     * @param string $userId
     * @param array $options
     * @return array|object
     */
    public function getUserPlaylists(string $userId, array $options = [])
    {
        return $this->baseSpotifyWebAPI->getUserPlaylists($userId, $options);
    }

    /**
     * @param string $playlistId
     * @param array $options
     * @return PlaylistTracksDataProvider
     */
    public function getPlaylistTracks(string $playlistId, array $options = []): PlaylistTracksDataProvider
    {
        $this->baseSpotifyWebAPI->setReturnType(Request::RETURN_ASSOC);
        $jsonObjectResult = $this->baseSpotifyWebAPI->getPlaylistTracks($playlistId, $options);
        $this->baseSpotifyWebAPI->setReturnType(Request::RETURN_OBJECT);

        $playlistTracksDataProvider = new PlaylistTracksDataProvider();
        $playlistTracksDataProvider->fromArray($jsonObjectResult);

        return $playlistTracksDataProvider;
    }

    /**
     * @param string $query
     * @param array $type
     * @param array $options
     * @return array|object
     */
    public function search(string $query, array $type, array $options = [])
    {
        return $this->baseSpotifyWebAPI->search($query, $type, $options);
    }
}