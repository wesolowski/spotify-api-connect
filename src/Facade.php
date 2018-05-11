<?php


namespace SpotifyApiConnect;


final class Facade
{
    /**
     * @var Factory
     */
    private $factory;

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $redirectUri
     */
    public function __construct(string $clientId, string $clientSecret, string $redirectUri)
    {
        $this->factory = new Factory($clientId, $clientSecret, $redirectUri);
    }


}