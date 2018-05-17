<?php


namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;


interface SpotifyWebApiInterface
{

    /**
     * @param string $userId
     * @param string $playlistId
     * @param array $tracks
     * @param array $options
     * @return bool
     */
    public function addUserPlaylistTracks(string $userId, string $playlistId, array $tracks, array $options = []);

    /**
     * @param string $userId
     * @param string $playlistId
     * @param array $tracks
     * @param string $snapshotId
     * @return bool|string
     */
    public function deleteUserPlaylistTracks(string $userId, string $playlistId, array $tracks, string $snapshotId = '');

    /**
     * @param string $userId
     * @param string $playlistId
     * @param array $options
     * @return object
     */
    public function getUserPlaylist(string $userId, string $playlistId, array $options = []);

    /**
     * @param string $userId
     * @param array $options
     * @return object
     */
    public function getUserPlaylists(string $userId, array $options = []);

    /**
     * @param string $userId
     * @param $playlistId
     * @param array $options
     * @return object
     */
    public function getUserPlaylistTracks(string $userId, $playlistId, array $options = []);

    /**
     * @param string $query
     * @param array $type
     * @param array $options
     * @return object
     */
    public function search(string $query, array $type, array $options = []);

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken);
}