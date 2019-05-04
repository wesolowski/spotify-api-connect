<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class ArtistDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider */
    protected $external_urls;

    /** @var string */
    protected $id;

    /** @var string */
    protected $uri;

    /** @var string */
    protected $type;

    /** @var string */
    protected $name;

    /** @var string */
    protected $href;


    /**
     * @return \SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider
     */
    public function getExternal_urls(): ?\SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider
    {
        return $this->external_urls;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider $external_urls
     * @return ArtistDataProvider
     */
    public function setExternal_urls(?\SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider $external_urls = null)
    {
        $this->external_urls = $external_urls;

        return $this;
    }


    /**
     * @return ArtistDataProvider
     */
    public function unsetExternal_urls()
    {
        $this->external_urls = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasExternal_urls()
    {
        return ($this->external_urls !== null && $this->external_urls !== []);
    }


    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }


    /**
     * @param string $id
     * @return ArtistDataProvider
     */
    public function setId(?string $id = null)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return ArtistDataProvider
     */
    public function unsetId()
    {
        $this->id = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasId()
    {
        return ($this->id !== null && $this->id !== []);
    }


    /**
     * @return string
     */
    public function getUri(): ?string
    {
        return $this->uri;
    }


    /**
     * @param string $uri
     * @return ArtistDataProvider
     */
    public function setUri(?string $uri = null)
    {
        $this->uri = $uri;

        return $this;
    }


    /**
     * @return ArtistDataProvider
     */
    public function unsetUri()
    {
        $this->uri = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasUri()
    {
        return ($this->uri !== null && $this->uri !== []);
    }


    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }


    /**
     * @param string $type
     * @return ArtistDataProvider
     */
    public function setType(?string $type = null)
    {
        $this->type = $type;

        return $this;
    }


    /**
     * @return ArtistDataProvider
     */
    public function unsetType()
    {
        $this->type = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasType()
    {
        return ($this->type !== null && $this->type !== []);
    }


    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @return ArtistDataProvider
     */
    public function setName(?string $name = null)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return ArtistDataProvider
     */
    public function unsetName()
    {
        $this->name = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasName()
    {
        return ($this->name !== null && $this->name !== []);
    }


    /**
     * @return string
     */
    public function getHref(): ?string
    {
        return $this->href;
    }


    /**
     * @param string $href
     * @return ArtistDataProvider
     */
    public function setHref(?string $href = null)
    {
        $this->href = $href;

        return $this;
    }


    /**
     * @return ArtistDataProvider
     */
    public function unsetHref()
    {
        $this->href = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasHref()
    {
        return ($this->href !== null && $this->href !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'external_urls' =>
          array (
            'name' => 'external_urls',
            'allownull' => true,
            'default' => '',
            'type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\ExternalUrlDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'id' =>
          array (
            'name' => 'id',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'uri' =>
          array (
            'name' => 'uri',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'type' =>
          array (
            'name' => 'type',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'name' =>
          array (
            'name' => 'name',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'href' =>
          array (
            'name' => 'href',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
