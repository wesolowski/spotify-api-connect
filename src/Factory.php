<?php


namespace SpotifyApiConnect;


use Dotenv\Dotenv;
use SpotifyApiConnect\Application\SpotifyApiAuth;
use SpotifyApiConnect\Application\SpotifyApiAuthInterface;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\Session;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SessionInterface;
use SpotifyApiConnect\Domain\Model\Config;

final class Factory
{
    /**
     * @return SpotifyApiAuthInterface
     */
    public function createSpotifyApiAuth() : SpotifyApiAuthInterface
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
     * @return Config
     */
    private function createConfig(): Config
    {
        return new Config();
    }

}