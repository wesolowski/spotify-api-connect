<?php

namespace SpotifyApiConnectTest\Unit\Application;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyApiAuth;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SessionInterface;
use SpotifyApiConnect\Message;

class SpotifyApiAuthTest extends TestCase
{

    public function testGetAuthorizeUrlForPlaylistModifyPublic()
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('getAuthorizeUrl')
            ->willReturn($this->returnValue('getAuthorizeUrl-mock'));

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
            ->willReturn($this->returnValue(true));

        $sessionMock->method('getRefreshToken')
            ->willReturn($this->returnValue('unit-test'));

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
            ->willReturn($this->returnValue(false));

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
            ->willReturn($this->returnValue(true));

        $sessionMock->method('getAccessToken')
            ->willReturn($this->returnValue('unit-test'));

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
            ->willReturn($this->returnValue(false));

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
     * @return MockObject
     */
    protected function getSessionMock(): MockObject
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
