<?php declare(strict_types=1);

namespace SpotifyApiConnect;

use Dotenv\Dotenv;
use SpotifyApiConnect\Application\SpotifyApiAuth;
use SpotifyApiConnect\Application\SpotifyApiAuthInterface;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\Session;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SessionInterface;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApi;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SpotifyWebApiInterface;
use SpotifyApiConnect\Domain\Model\Config;
use SpotifyApiConnect\Domain\Model\ConfigInterface;

final class Factory implements FactoryInterface
{
    /**
     * @param string $accessToken
     * @return SpotifyWebApiInterface
     */
    public function createSpotifyWebApi(string $accessToken) : SpotifyWebApiInterface
    {
        return new SpotifyWebApi($accessToken);
    }

    /**
     * @return SpotifyApiAuthInterface
     */
    public function createSpotifyApiAuth(): SpotifyApiAuthInterface
    {
        return new SpotifyApiAuth(
            $this->createSpotifyWebApiPhpSession()
        );
    }

    /**
     * @return SessionInterface
     */
    private function createSpotifyWebApiPhpSession(): SessionInterface
    {
        return new Session(
            $this->createConfig()
        );
    }

    /**
     * @return ConfigInterface
     */
    private function createConfig(): ConfigInterface
    {
        return new Config();
    }

}