<?php


namespace SpotifyApiConnect;


use SpotifyApiConnect\Application\SpotifyApiAuth;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\Session;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SessionInterface;

final class Factory
{
    /**
     * @var SessionInterface
     */
    private $spotifyWebApiSession;

    /**
     * @var \SpotifyWebAPI\SpotifyWebAPI
     */
    private $spotifyWebAPI;

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $redirectUri
     */
    public function __construct(string $clientId, string $clientSecret, string $redirectUri)
    {

        $this->spotifyWebApiSession = new Session(
            $clientId,
            $clientSecret,
            $redirectUri
        );
        $this->spotifyWebAPI = new \SpotifyWebAPI\SpotifyWebAPI();
    }

    /**
     * @return SpotifyApiAuth
     */
    public function createSpotifyApiAuth()
    {
        return new SpotifyApiAuth(
            $this->spotifyWebApiSession
        );
    }


}