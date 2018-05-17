<?php

namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

interface SessionInterface
{

    /**
     * @param array $options
     * @return string
     */
    public function getAuthorizeUrl(array $options = []): string;

    /**
     * @param string $authorizationCode
     * @return bool
     */
    public function requestAccessToken(string $authorizationCode): bool;

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
    public function refreshAccessToken(string $refreshToken): bool;
}