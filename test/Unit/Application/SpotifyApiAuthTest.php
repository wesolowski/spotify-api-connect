<?php

namespace SpotifyApiConnectTest\Unit\Application;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\Timer\RuntimeException;
use SpotifyApiConnect\Application\SpotifyApiAuth;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SessionInterface;
use SpotifyApiConnect\Message;

class SpotifyApiAuthTest extends TestCase
{

    public function testGetAuthorizeUrlForPlaylistModifyPublic()
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('getAuthorizeUrl')
            ->will($this->returnValue('getAuthorizeUrl-mock'));

        $spotifyApiAuth = new SpotifyApiAuth($sessionMock);
        $this->assertSame(
            'getAuthorizeUrl-mock',
            $spotifyApiAuth->getAuthorizeUrlForPlaylistModifyPublic()
        );
    }

    public function testGetRefreshTokenByCode()
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('requestAccessToken')
            ->will($this->returnValue(true));

        $sessionMock->method('getRefreshToken')
            ->will($this->returnValue('unit-test'));

        $spotifyApiAuth = new SpotifyApiAuth($sessionMock);
        $this->assertSame(
            'unit-test',
            $spotifyApiAuth->getRefreshTokenByCode('unit')
        );
    }

    public function testGetRefreshTokenByCodeWithException()
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('requestAccessToken')
            ->will($this->returnValue(false));

        try {
            $spotifyApiAuth = new SpotifyApiAuth($sessionMock);
            $spotifyApiAuth->getRefreshTokenByCode('unit');
        } catch (\RuntimeException $e) {
            $this->assertSame(
                Message::ERROR_GET_REQUEST_TOKEN_BY_CODE,
                $e->getMessage()
            );
            return;
        }

        $this->fail();
    }

    public function testGetAccessByRefreshToken()
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('refreshAccessToken')
            ->will($this->returnValue(true));

        $sessionMock->method('getAccessToken')
            ->will($this->returnValue('unit-test'));

        $spotifyApiAuth = new SpotifyApiAuth($sessionMock);
        $this->assertSame(
            'unit-test',
            $spotifyApiAuth->getAccessByRefreshToken('unit')
        );
    }

    public function testGetAccessByRefreshTokenWithException()
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('refreshAccessToken')
            ->will($this->returnValue(false));

        try {
            $spotifyApiAuth = new SpotifyApiAuth($sessionMock);
            $spotifyApiAuth->getAccessByRefreshToken('unit');
        } catch (\RuntimeException $e) {
            $this->assertSame(
                Message::ERROR_GET_REFRESH_TOKEN_BY_CODE,
                $e->getMessage()
            );
            return;
        }

        $this->fail();
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function getSessionMock(): \PHPUnit\Framework\MockObject\MockObject
    {
        return $this->getMockBuilder(SessionInterface::class)
            ->setMethods([
                'getAuthorizeUrl',
                'getAccessToken',
                'getRefreshToken',
                'refreshAccessToken',
                'requestAccessToken',
            ])
            ->getMock();
    }

}
