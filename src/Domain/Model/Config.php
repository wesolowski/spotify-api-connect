<?php declare(strict_types=1);

namespace SpotifyApiConnect\Domain\Model;

use SpotifyApiConnect\Message;
use RuntimeException;

final class Config implements ConfigInterface
{
    /**
     * @return string
     */
    public function getClientId(): string
    {
        $clientId = (string)$this->get('CLIENT_ID');
        if (empty($clientId)) {
            throw new RuntimeException(
                sprintf(Message::ERROR_GET_ENV_VARIABLE, 'CLIENT_ID')
            );
        }

        return $clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        $clientSecret = (string)$this->get('CLIENT_SECRET');
        if (empty($clientSecret)) {
            throw new RuntimeException(
                sprintf(Message::ERROR_GET_ENV_VARIABLE, 'CLIENT_SECRET')
            );
        }

        return $clientSecret;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        $redirectUri = (string)$this->get('REDIRECT_URI');
        if (empty($redirectUri)) {
            throw new RuntimeException(
                sprintf(Message::ERROR_GET_ENV_VARIABLE, 'REDIRECT_URI')
            );
        }

        return $redirectUri;
    }

    /**
     * @return string
     */
    public function getSpotifyUsername(): string
    {
        $spotifyUsername = (string)$this->get('SPOTIFY_USERNAME');
        if (empty($spotifyUsername)) {
            throw new RuntimeException(
                sprintf(Message::ERROR_GET_ENV_VARIABLE, 'SPOTIFY_USERNAME')
            );
        }

        return $spotifyUsername;
    }

    /**
     * @param string $name
     * @return mixed
     */
    private function get(string $name)
    {
        if(!empty(getenv($name))) {
            return getenv($name);
        } elseif (isset($_ENV[$name])) {
            return $_ENV[$name];
        } elseif (isset($_SERVER[$name])) {
            return $_SERVER[$name];
        }
        
        return false;
    }
}
