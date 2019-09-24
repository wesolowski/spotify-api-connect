<?php declare(strict_types=1);


namespace SpotifyApiConnectTest\Unit\Domain\Model;


use PHPUnit\Framework\TestCase;
use RuntimeException;
use SpotifyApiConnect\Domain\Model\Config;

class ConfigTest extends TestCase
{
    private $env = [
        'CLIENT_ID' => null,
        'CLIENT_SECRET' => null,
        'REDIRECT_URI' => null,
        'SPOTIFY_USERNAME' => null,
    ];

    /**
     * @var Config
     */
    private $config;

    protected function setUp(): void
    {
        $this->config = new Config();
        foreach ($this->env as $envName => $envValue) {
            $this->env[$envName] = $_ENV[$envName];
            $_ENV[$envName] = null;
            putenv($envName.'=0');
        }
        parent::setUp();
    }

    protected function tearDown(): void
    {
        foreach ($this->env as $envName => $envValue) {
            $_ENV[$envName] = $envValue;
        }
        parent::tearDown();
    }

    public function testGetClientSecret()
    {
        $envValue = 'UnitSecret';
        $_ENV['CLIENT_SECRET'] = $envValue;
        $this->assertSame($envValue,$this->config->getClientSecret());
    }

    public function testGetClientSecretException()
    {
        $this->expectException(RuntimeException::class);
        $this->config->getClientSecret();
    }

    public function testGetClientId()
    {
        $envValue = 'UnitId';
        $_ENV['CLIENT_ID'] = $envValue;
        $this->assertSame($envValue,$this->config->getClientId());
    }

    public function testGetClientIdException()
    {
        $this->expectException(RuntimeException::class);
        $this->config->getClientId();
    }

    public function testGetRedirectUri()
    {
        $envValue = 'UnitRedirectUri';
        $_ENV['REDIRECT_URI'] = $envValue;
        $this->assertSame($envValue,$this->config->getRedirectUri());
    }

    public function testGetRedirectUriException()
    {
        $this->expectException(RuntimeException::class);
        $this->config->getRedirectUri();
    }

    public function testGetSpotifyUsername()
    {
        $envValue = 'UnitSpotifyUserName';
        $_ENV['SPOTIFY_USERNAME'] = $envValue;
        $this->assertSame($envValue,$this->config->getSpotifyUsername());
    }

    public function testGetSpotifyUsernameException()
    {
        $this->expectException(RuntimeException::class);
        $this->config->getSpotifyUsername();
    }

}