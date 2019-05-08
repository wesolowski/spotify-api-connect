<?php declare(strict_types=1);

namespace SpotifyApiConnect;

use SpotifyApiConnect\Application\SpotifyApiAuthInterface;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApiInterface;

final class SpotifyApiConnectFacade implements SpotifyApiConnectFacadeInterface
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new Factory();
    }

    /**
     * @return SpotifyApiAuthInterface
     */
    public function getSpotifyApiAuth() : SpotifyApiAuthInterface
    {
        return $this->factory->createSpotifyApiAuth();
    }

    /**
     * @param string $accessToken
     * @return SpotifyWebApiInterface
     */
    public function getSpotifyWebApi(string $accessToken) : SpotifyWebApiInterface
    {
        return $this->factory->createSpotifyWebApi($accessToken);
    }


}