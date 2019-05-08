<?php declare(strict_types=1);

namespace SpotifyApiConnect;

use SpotifyApiConnect\Application\SpotifyApiAuthInterface;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApiInterface;

interface SpotifyApiConnectFacadeInterface
{
    /**
     * @return SpotifyApiAuthInterface
     */
    public function getSpotifyApiAuth(): SpotifyApiAuthInterface;

    /**
     * @param string $accessToken
     * @return SpotifyWebApiInterface
     */
    public function getSpotifyWebApi(string $accessToken): SpotifyWebApiInterface;
}