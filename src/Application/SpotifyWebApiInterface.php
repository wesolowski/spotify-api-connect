<?php declare(strict_types=1);

namespace SpotifyApiConnect\SpotifyWebApiPhp;

use SpotifyApiConnect\Domain\DataTransferObject\PlaylistDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\TrackSearchRequestDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\TracksSearchDataProvider;
use SpotifyApiConnect\Domain\DataTransferObject\UserPlaylistsDataProvider;
use SpotifyApiConnect\Domain\Exception\PlaylistNotFound;

interface SpotifyWebApiInterface
{
    /**
     * @param string $playlistId
     * @param array $tracks
     * @param array $options
     * @return bool
     */
    public function addPlaylistTracks($playlistId, array $tracks, array $options = []): bool;

    /**
     * @param string $playlistId
     * @param array $tracks
     * @return bool
     */
    public function deletePlaylistTracks(string $playlistId, array $tracks): bool;

    /**
     * @param string $playlistId
     * @param array $options
     * @return PlaylistDataProvider
     */
    public function getPlaylist(string $playlistId, array $options = []): PlaylistDataProvider;

    /**
     * @param $playlistId
     * @param array $options
     * @return object
     */
    public function getPlaylistTracks(string $playlistId, array $options = []);

    /**
     * @param string $userId
     * @param string $playlistName
     * @param array $options
     * @return PlaylistDataProvider
     * @throws PlaylistNotFound
     */
    public function getUserPlaylistByName(string $userId, string $playlistName, array $options = []): PlaylistDataProvider;

    /**
     * @param TrackSearchRequestDataProvider $trackSearchRequest
     * @param array $options
     * @return TracksSearchDataProvider
     */
    public function searchTrack(TrackSearchRequestDataProvider $trackSearchRequest, array $options = []): TracksSearchDataProvider;
}