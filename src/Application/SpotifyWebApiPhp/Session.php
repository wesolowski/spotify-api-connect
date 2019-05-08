<?php declare(strict_types=1);

namespace SpotifyApiConnect\Application\SpotifyWebApiPhp;

use SpotifyApiConnect\Domain\Model\ConfigInterface;
use \SpotifyWebAPI\Session as BaseSession;

class Session implements SessionInterface
{
    /**
     * @var BaseSession
     */
    private $baseSession;

    /**
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->baseSession = new BaseSession(
            $config->getClientId(),
            $config->getClientSecret(),
            $config->getRedirectUri()
        );
    }

    /**
     * @param array $options
     * @return string
     */
    public function getAuthorizeUrl(array $options = []) : string
    {
        return $this->baseSession->getAuthorizeUrl($options);
    }

    /**
     * @param string $authorizationCode
     * @return bool
     */
    public function requestAccessToken(string $authorizationCode) : bool
    {
        return $this->baseSession->requestAccessToken($authorizationCode);
    }


    /**
     * @return string
     */
    public function getAccessToken() : string
    {
        return $this->baseSession->getAccessToken();
    }

    /**
     * @return string
     */
    public function getRefreshToken() : string
    {
        return $this->baseSession->getRefreshToken();
    }

    /**
     * @param string $refreshToken
     * @return bool
     */
    public function refreshAccessToken(string $refreshToken) : bool
    {
        return $this->baseSession->refreshAccessToken($refreshToken);
    }


}