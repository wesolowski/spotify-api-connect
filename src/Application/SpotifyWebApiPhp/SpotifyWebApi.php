<?php declare(strict_types=1);


namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

use SpotifyApiConnect\Domain\DataTransferObject\DeleteTrackInfoDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\PlaylistDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\TrackSearchRequestDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\TracksSearchDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\UserPlaylistsDataProvider;
use SpotifyApiConnect\Domain\Exception\PlaylistNotFound;
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
        $this->baseSpotifyWebAPI->setReturnType(Request::RETURN_ASSOC);
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
            if (!$deleteTrackInfoDataProvider instanceof DeleteTrackInfoDataProvider) {
                throw new \RuntimeException(
                    sprintf('tracksInfo should be instanceof class: %s', DeleteTrackInfoDataProvider::class)
                );
            }
            $tracksToDelete[] = $deleteTrackInfoDataProvider->toArray();
        }

        $this->baseSpotifyWebAPI->setReturnType(Request::RETURN_OBJECT);
        $delete = (bool)$this->baseSpotifyWebAPI->deletePlaylistTracks($playlistId, $tracksToDelete);
        $this->baseSpotifyWebAPI->setReturnType(Request::RETURN_ASSOC);

        return $delete;
    }

    /**
     * @param string $playlistId
     * @param array $options
     * @return PlaylistDataProvider
     */
    public function getPlaylist(string $playlistId, array $options = []): PlaylistDataProvider
    {
        $jsonObjectResult = $this->baseSpotifyWebAPI->getPlaylist($playlistId, $options);

        $playlistDataProvider = new PlaylistDataProvider();
        $playlistDataProvider->fromArray($jsonObjectResult);

        return $playlistDataProvider;
    }

    /**
     * @param string $userId
     * @param string $playlistName
     * @param array $options
     * @return PlaylistDataProvider
     * @throws PlaylistNotFound
     */
    public function getUserPlaylistByName(string $userId, string $playlistName, array $options = []): PlaylistDataProvider
    {
        $userPlaylistsDataProvider = $this->getUserPlaylists($userId, $options);
        $playlists = $userPlaylistsDataProvider->getItems();
        foreach ($playlists as $playlist) {
            if (trim($playlist->getName()) === trim($playlistName)) {
                return $playlist;
            }
        }

        throw new PlaylistNotFound(sprintf('Playlist "%s" not found', $playlistName));
    }

    /**
     * @param string $playlistId
     * @param array $options
     * @return PlaylistTracksDataProvider
     */
    public function getPlaylistTracks(string $playlistId, array $options = []): PlaylistTracksDataProvider
    {
        $jsonObjectResult = $this->baseSpotifyWebAPI->getPlaylistTracks($playlistId, $options);

        $playlistTracksDataProvider = new PlaylistTracksDataProvider();
        $playlistTracksDataProvider->fromArray($jsonObjectResult);

        return $playlistTracksDataProvider;
    }

    /**
     * @param TrackSearchRequestDataProvider $trackSearchRequest
     * @param array $options
     * @return TracksSearchDataProvider
     */
    public function searchTrack(TrackSearchRequestDataProvider $trackSearchRequest, array $options = []): TracksSearchDataProvider
    {
        $jsonObjectResult = $this->search(
            sprintf(
                'track:%s artist:%s',
                $trackSearchRequest->getTrack(),
                $trackSearchRequest->getArtist()
            ), [
            $trackSearchRequest->getType()
        ],
            $options
        );

        $tracksSearchDataProvider = new TracksSearchDataProvider();
        $tracksSearchDataProvider->fromArray($jsonObjectResult[$trackSearchRequest->getResultType()]);

        return $tracksSearchDataProvider;
    }

    /**
     * @param string $query
     * @param array $type
     * @param array $options
     * @return array
     */
    private function search(string $query, array $type, array $options = []): array
    {
        return (array)$this->baseSpotifyWebAPI->search($query, $type, $options);
    }

    /**
     * @param string $userId
     * @param array $options
     * @return UserPlaylistsDataProvider
     */
    private function getUserPlaylists(string $userId, array $options = []): UserPlaylistsDataProvider
    {
        $userPlaylistInfo = (array)$this->baseSpotifyWebAPI->getUserPlaylists($userId, $options);

        $userPlaylistsDataProvider = new UserPlaylistsDataProvider();
        $userPlaylistsDataProvider->fromArray($userPlaylistInfo);

        return $userPlaylistsDataProvider;
    }
}