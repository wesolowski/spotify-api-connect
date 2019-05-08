<?php declare(strict_types=1);

namespace SpotifyApiConnect;

interface Message
{
    public const ERROR_GET_REQUEST_TOKEN_BY_CODE = 'fail request access token';

    public const ERROR_GET_REFRESH_TOKEN_BY_CODE = 'fail refresh access token';

    public const ERROR_GET_ENV_VARIABLE = 'Env-variable: "%s" is empty or not exist';

    public const ERROR_DELETE_PLAYLIST_TRACKS = 'tracksInfo should be instanceof class: %s';

    public const ERROR_GET_USER_PLAYLIST_BY_NAME = 'Playlist "%s" not found';

    public const SEARCH_TRACK = 'track:%s artist:%s';
}