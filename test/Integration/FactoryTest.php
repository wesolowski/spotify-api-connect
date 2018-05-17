<?php


namespace SpotifyApiConnectTest\Integration;


use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyApiAuthInterface;
use SpotifyApiConnect\Factory;

class FactoryTest extends TestCase
{
    public function testCreateSpotifyApiAuth()
    {
        $factory = new Factory();
        $spotifyApiAuth = $factory->createSpotifyApiAuth();
        $this->assertInstanceOf(SpotifyApiAuthInterface::class, $spotifyApiAuth);
        $this->assertNotEmpty($spotifyApiAuth->getAuthorizeUrlForPlaylistModifyPublic());
    }
}