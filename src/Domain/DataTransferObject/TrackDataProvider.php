<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class TrackDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \SpotifyApiConnect\Domain\DataTransferObject\ArtistDataProvider[] */
    protected $artists = [];

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
     * @return \SpotifyApiConnect\Domain\DataTransferObject\ArtistDataProvider[]
     */
    public function getArtists(): ?array
    {
        return $this->artists;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\ArtistDataProvider[] $artists
     * @return TrackDataProvider
     */
    public function setArtists(?array $artists = null)
    {
        $this->artists = $artists;

        return $this;
    }


    /**
     * @return TrackDataProvider
     */
    public function unsetArtists()
    {
        $this->artists = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasArtists()
    {
        return ($this->artists !== null && $this->artists !== []);
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\ArtistDataProvider $artist
     * @return TrackDataProvider
     */
    public function addartist(ArtistDataProvider $artist)
    {
        $this->artists[] = $artist; return $this;
    }


    /**
     * @return \SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider
     */
    public function getExternal_urls(): ?\SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider
    {
        return $this->external_urls;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider $external_urls
     * @return TrackDataProvider
     */
    public function setExternal_urls(?\SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider $external_urls = null)
    {
        $this->external_urls = $external_urls;

        return $this;
    }


    /**
     * @return TrackDataProvider
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
     * @return TrackDataProvider
     */
    public function setId(?string $id = null)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return TrackDataProvider
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
     * @return TrackDataProvider
     */
    public function setUri(?string $uri = null)
    {
        $this->uri = $uri;

        return $this;
    }


    /**
     * @return TrackDataProvider
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
     * @return TrackDataProvider
     */
    public function setType(?string $type = null)
    {
        $this->type = $type;

        return $this;
    }


    /**
     * @return TrackDataProvider
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
     * @return TrackDataProvider
     */
    public function setName(?string $name = null)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return TrackDataProvider
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
     * @return TrackDataProvider
     */
    public function setHref(?string $href = null)
    {
        $this->href = $href;

        return $this;
    }


    /**
     * @return TrackDataProvider
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
          'artists' =>
          array (
            'name' => 'artists',
            'allownull' => true,
            'default' => '',
            'type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\ArtistDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'artist',
            'singleton_type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\ArtistDataProvider',
          ),
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
