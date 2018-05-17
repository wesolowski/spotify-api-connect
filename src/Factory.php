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
    public function __construct()
    {
        $envFile = __DIR__ . '/../.env';
        if (!file_exists($envFile)) {
            throw new \RuntimeException('Pleas create ".env"-File and fill this file with info');
        }
        if (null === getenv('CLIENT_ID')) {
            (new Dotenv())->load($envFile);
        }
    }

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
        return new Config(
            getenv('CLIENT_ID'),
            getenv('CLIENT_SECRET'),
            getenv('REDIRECT_URI')
        );
    }

}