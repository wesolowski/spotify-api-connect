<?php declare(strict_types=1);

namespace SpotifyApiConnect\Domain\Model;

interface ConfigInterface
{
    /**
     * @return string
     */
    public function getClientId(): string;

    /**
     * @return string
     */
    public function getClientSecret(): string;

    /**
     * @return string
     */
    public function getRedirectUri(): string;

    /**
     * @return string
     */
    public function getSpotifyUsername(): string;
}