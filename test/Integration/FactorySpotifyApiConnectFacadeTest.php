<?php declare(strict_types=1);


namespace SpotifyApiConnectTest\Integration;


use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyApiAuthInterface;
use SpotifyApiConnect\Factory;
use SpotifyApiConnect\SpotifyApiConnectFacade;

class FactorySpotifyApiConnectFacadeTest extends TestCase
{
    public function testCreateSpotifyApiAuth()
    {
        $spotifyApiConnectFacade = new SpotifyApiConnectFacade();
        $spotifyApiAuth = $spotifyApiConnectFacade->getSpotifyApiAuth();
        $this->assertNotEmpty($spotifyApiAuth->getAuthorizeUrlForPlaylistModifyPublic());
    }
}