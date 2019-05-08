<?php declare(strict_types=1);

namespace SpotifyApiConnect;

use SpotifyApiConnect\Application\SpotifyApiAuthInterface;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApiInterface;

interface FactoryInterface
{
    /**
     * @param string $accessToken
     * @return SpotifyWebApiInterface
     */
    public function createSpotifyWebApi(string $accessToken): SpotifyWebApiInterface;

    /**
     * @return SpotifyApiAuthInterface
     */
    public function createSpotifyApiAuth(): SpotifyApiAuthInterface;
}