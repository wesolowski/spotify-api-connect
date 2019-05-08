<?php


namespace SpotifyApiConnect;


interface Message
{
    public const ERROR_GET_REQUEST_TOKEN_BY_CODE = 'fail request access token';

    public const ERROR_GET_REFRESH_TOKEN_BY_CODE = 'fail refresh access token';

    public const ERROR_GET_ENV_VARIABLE = 'Env-variable: "%s" is empty or not exist';
}