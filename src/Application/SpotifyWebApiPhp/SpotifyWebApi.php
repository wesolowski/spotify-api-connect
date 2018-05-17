<?php declare(strict_types=1);


namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

use SpotifyWebAPI\SpotifyWebAPI as BaseSpotifyWebAPI;

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
     * @return object
     */
    public function getUserPlaylist(string $userId, string $playlistId, array $options = [])
    {
        return $this->baseSpotifyWebAPI->getUserPlaylist($userId, $playlistId, $options);
    }

    /**
     * @param string $userId
     * @param array $options
     * @return object
     */
    public function getUserPlaylists(string $userId, array $options = [])
    {
        return $this->baseSpotifyWebAPI->getUserPlaylists($userId, $options);
    }

    /**
     * @param string $userId
     * @param $playlistId
     * @param array $options
     * @return object
     */
    public function getUserPlaylistTracks(string $userId, $playlistId, array $options = [])
    {
        return $this->baseSpotifyWebAPI->getUserPlaylistTracks($userId, $playlistId, $options);
    }

    /**
     * @param string $query
     * @param array $type
     * @param array $options
     * @return object
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