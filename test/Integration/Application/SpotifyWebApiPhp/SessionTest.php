<?php

namespace SpotifyApiConnectTest\Integration\Application\SpotifyWebApiPhp;

use PHPUnit\Framework\TestCase;
use SpotifyApiConnect\Application\SpotifyWebApiPhp\Session;


class SessionTest extends TestCase
{
    /**
     * @var Session
     */
    private $session;

    protected function setUp()
    {
        parent::setUp();

        $this->session = new Session(
            getenv('CLIENT_ID'),
            getenv('CLIENT_SECRET'),
            getenv('REDIRECT_URI')
        );
    }


    public function testGetAuthorizeUrl()
    {
        $redirectUrl = $this->session->getAuthorizeUrl([]);

        $this->assertNotEmpty($redirectUrl, 'authorize url from spotify is empty');

        $parseRedirectUrl = parse_url($redirectUrl);
        $this->assertSame('accounts.spotify.com', $parseRedirectUrl['host']);
        $this->assertSame('/authorize/', $parseRedirectUrl['path']);

        $this->assertNotEmpty($parseRedirectUrl['query']);

        $info = [];
        parse_str($parseRedirectUrl['query'], $info);

        $this->assertSame('code', $info['response_type']);
        $this->assertSame('http://localhost/', $info['redirect_uri']);
        $this->assertTrue(isset($info['client_id']));
    }

    public function testRefreshAccessToken()
    {
        $this->assertTrue($this->session->refreshAccessToken(getenv('REFRESH_TOKEN')));
        $this->assertNotEmpty($this->session->getAccessToken());
    }

}
