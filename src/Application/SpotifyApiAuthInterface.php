<?php

namespace SpotifyApiConnect\Application;

interface SpotifyApiAuthInterface
{
    /**
     * @return string
     */
    public function getAuthorizeUrlForPlaylistModifyPublic(): string;

    /**
     * @param string $code
     * @return string
     */
    public function getRefreshTokenByCode(string $code): string;

    /**
     * @param string $refreshAccessToken
     * @return string
     */
    public function getAccessByRefreshToken(string $refreshAccessToken): string;
}