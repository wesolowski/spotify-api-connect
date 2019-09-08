<?php declare(strict_types=1);

namespace SpotifyApiConnectTest\Unit\Application;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyApiAuth;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\SessionInterface;
use SpotifyApiConnect\Message;

class SpotifyApiAuthTest extends TestCase
{

    public function testGetAuthorizeUrlForPlaylistModifyPublic(): void
    {
        var_dump($_ENV['test'], getenv('test'));
        $sessionMock = $this->getSessionMock();

        $sessionMock->method('getAuthorizeUrl')
            ->willReturn('getAuthorizeUrl-mock');

        $spotifyApiAuth = new SpotifyApiAuth($sessionMock);
        $this->assertSame(
            'getAuthorizeUrl-mock',
            $spotifyApiAuth->getAuthorizeUrlForPlaylistModifyPublic()
        );
    }

    public function testGetRefreshTokenByCode(): void
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('requestAccessToken')
            ->willReturn(true);

        $sessionMock->method('getRefreshToken')
            ->willReturn('unit-test');

        $spotifyApiAuth = new SpotifyApiAuth($sessionMock);
        $this->assertSame(
            'unit-test',
            $spotifyApiAuth->getRefreshTokenByCode('unit')
        );
    }

    public function testGetRefreshTokenByCodeWithException(): void
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('requestAccessToken')
            ->willReturn(false);

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

    public function testGetAccessByRefreshToken(): void
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('refreshAccessToken')
            ->willReturn(true);

        $sessionMock->method('getAccessToken')
            ->willReturn('unit-test');

        $spotifyApiAuth = new SpotifyApiAuth($sessionMock);
        $this->assertSame(
            'unit-test',
            $spotifyApiAuth->getAccessByRefreshToken('unit')
        );
    }

    public function testGetAccessByRefreshTokenWithException(): void
    {
        $sessionMock = $this->getSessionMock();
        $sessionMock->method('refreshAccessToken')
            ->willReturn(false);

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
     * @throws \ReflectionException
     */
    private function getSessionMock(): MockObject
    {
        $mockObject = $this->getMockBuilder(SessionInterface::class)
            ->setMethods([
                'getAuthorizeUrl',
                'getAccessToken',
                'getRefreshToken',
                'refreshAccessToken',
                'requestAccessToken',
            ]);

        return $mockObject->getMock();
    }

}
