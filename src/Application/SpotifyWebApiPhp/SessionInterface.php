<?php

namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

interface SessionInterface
{
    /**
     * @param array $options
     * @return string
     */
    public function getAuthorizeUrl($options = []): string;

    /**
     * @return string
     */
    public function getAccessToken(): string;

    /**
     * @return string
     */
    public function getRefreshToken(): string;

    /**
     * @param string $refreshToken
     * @return bool
     */
    public function refreshAccessToken($refreshToken): bool;

    /**
     * @param string $authorizationCode
     * @return bool
     */
    public function requestAccessToken($authorizationCode): bool;
}