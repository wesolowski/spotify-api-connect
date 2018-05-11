<?php


namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

use \SpotifyWebAPI\Session as BaseSession;

class Session extends BaseSession implements SessionInterface
{
    /**
     * @param array $options
     * @return string
     */
    public function getAuthorizeUrl($options = []) : string
    {
        return parent::getAuthorizeUrl($options);
    }

    /**
     * @param string $authorizationCode
     * @return bool
     */
    public function requestAccessToken($authorizationCode) : bool
    {
        return parent::requestAccessToken($authorizationCode);
    }


    /**
     * @return string
     */
    public function getAccessToken() : string
    {
        return parent::getAccessToken();
    }

    /**
     * @return string
     */
    public function getRefreshToken() : string
    {
        return parent::getRefreshToken();
    }

    /**
     * @param string $refreshToken
     * @return bool
     */
    public function refreshAccessToken($refreshToken) : bool
    {
        return parent::refreshAccessToken($refreshToken);
    }


}