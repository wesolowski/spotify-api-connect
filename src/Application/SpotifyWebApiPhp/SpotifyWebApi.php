<?php declare(strict_types=1);


namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

use SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider;
use SpotifyWebAPI\SpotifyWebAPI as BaseSpotifyWebAPI;
use SpotifyWebAPI\Request;

class SpotifyWebApi implements SpotifyWebApiInterface
{
    /**
     * @var BaseSpotifyWebAPI
     */
    private $baseSpotifyWebAPI;

    public function __construct()
    {
        $this->baseSpotifyWebAPI = new BaseSpotifyWebAPI();
    }

    /**
     * @param string $userId
     * @param string $playlistId
     * @param array $tracks
     * @param array $options
     * @return bool
     */
    public function addUserPlaylistTracks(string $userId, string $playlistId, array $tracks, array $options = [])
    {
        return $this->baseSpotifyWebAPI->addUserPlaylistTracks($userId, $playlistId, $tracks, $options);
    }

    /**
     * @param string $userId
     * @param string $playlistId
     * @param array $tracks
     * @param string $snapshotId
     * @return bool|string
     */
    public function deleteUserPlaylistTracks(string $userId, string $playlistId, array $tracks, string $snapshotId = '')
    {
        return $this->baseSpotifyWebAPI->deleteUserPlaylistTracks($userId, $playlistId, $tracks, $snapshotId);
    }

    /**
     * @param string $userId
     * @param string $playlistId
     * @param array $options
     * @return array|object
     */
    public function getUserPlaylist(string $userId, string $playlistId, array $options = [])
    {
        return $this->baseSpotifyWebAPI->getUserPlaylist($userId, $playlistId, $options);
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
    public function getPlaylistTracks(string $playlistId, array $options = []) : PlaylistTracksDataProvider
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

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken)
    {
        $this->baseSpotifyWebAPI->setAccessToken($accessToken);
    }

}