<?php declare(strict_types=1);

namespace SpotifyApiConnect\Application;

use SpotifyApiConnect\Application\SpotifyWebApiPhp\SessionInterface;
use SpotifyApiConnect\Message;

class SpotifyApiAuth implements SpotifyApiAuthInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @return string
     */
    public function getAuthorizeUrlForPlaylistModifyPublic(): string
    {
        $options = [
            'scope' => [
                'playlist-modify-public',
            ],
        ];
        return $this->session->getAuthorizeUrl($options);
    }

    /**
     * @param string $code
     * @return string
     */
    public function getRefreshTokenByCode(string $code): string
    {
        if ($this->session->requestAccessToken($code) !== true) {
            throw new \RuntimeException(Message::ERROR_GET_REQUEST_TOKEN_BY_CODE);
        }
        return $this->session->getRefreshToken();
    }

    /**
     * @param string $refreshAccessToken
     * @return string
     */
    public function getAccessByRefreshToken(string $refreshAccessToken) : string
    {
        if( $this->session->refreshAccessToken($refreshAccessToken) !== true ) {
            throw new \RuntimeException(Message::ERROR_GET_REFRESH_TOKEN_BY_CODE);
        }
        return $this->session->getAccessToken();
    }


}