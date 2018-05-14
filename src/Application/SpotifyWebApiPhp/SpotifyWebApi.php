<?php


namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

use SpotifyWebAPI\SpotifyWebAPI as BaseSpotifyWebAPI;

class SpotifyWebApi extends BaseSpotifyWebAPI implements SpotifyWebApiInterface
{
    public function addUserPlaylistTracks($userId, $playlistId, $tracks, $options = [])
    {
        return parent::addUserPlaylistTracks($userId, $playlistId, $tracks, $options);
    }

    public function deleteUserPlaylistTracks($userId, $playlistId, $tracks, $snapshotId = '')
    {
        return parent::deleteUserPlaylistTracks($userId, $playlistId, $tracks, $snapshotId);
    }

    public function getUserPlaylist($userId, $playlistId, $options = [])
    {
        return parent::getUserPlaylist($userId, $playlistId, $options);
    }

    public function getUserPlaylists($userId, $options = [])
    {
        return parent::getUserPlaylists($userId, $options);
    }

    public function getUserPlaylistTracks($userId, $playlistId, $options = [])
    {
        return parent::getUserPlaylistTracks($userId, $playlistId, $options);
    }

    public function search($query, $type, $options = [])
    {
        return parent::search($query, $type, $options);
    }

    public function setAccessToken($accessToken)
    {
        parent::setAccessToken($accessToken);
    }

}