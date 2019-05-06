<?php


namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;


use SpotifyApiConnect\Domain\DataTransferObject\PlaylistDataProvider;

interface SpotifyWebApiInterface
{
    /**
     * @param string $playlistId
     * @param array $tracks
     * @param array $options
     * @return bool
     */
    public function addPlaylistTracks($playlistId, array $tracks, array $options = []) : bool;

    /**
     * @param string $userId
     * @param string $playlistId
     * @param array $tracks
     * @param string $snapshotId
     * @return bool|string
     */
    public function deleteUserPlaylistTracks(string $userId, string $playlistId, array $tracks, string $snapshotId = '');

    /**
     * @param string $playlistId
     * @param array $options
     * @return PlaylistDataProvider
     */
    public function getPlaylist(string $playlistId, array $options = []) : PlaylistDataProvider;

    /**
     * @param string $userId
     * @param array $options
     * @return object
     */
    public function getUserPlaylists(string $userId, array $options = []);

    /**
     * @param $playlistId
     * @param array $options
     * @return object
     */
    public function getPlaylistTracks(string $playlistId, array $options = []);

    /**
     * @param string $query
     * @param array $type
     * @param array $options
     * @return object
     */
    public function search(string $query, array $type, array $options = []);
}