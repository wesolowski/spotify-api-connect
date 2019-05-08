<?php

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
        $clientId = (string)getenv('CLIENT_ID');
        if (empty($clientId)) {
            throw new RuntimeException(
                sprintf(Message::ERROR_GET_ENV_VARIABLE, CLIENT_ID)
            );
        }

        return $clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        $clientSecret = (string)getenv('CLIENT_SECRET');
        if (empty($clientSecret)) {
            throw new RuntimeException(
                sprintf(Message::ERROR_GET_ENV_VARIABLE, CLIENT_SECRET)
            );
        }

        return $clientSecret;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        $redirectUri = (string)getenv('REDIRECT_URI');
        if (empty($redirectUri)) {
            throw new RuntimeException(
                sprintf(Message::ERROR_GET_ENV_VARIABLE, REDIRECT_URI)
            );
        }

        return $redirectUri;
    }


}