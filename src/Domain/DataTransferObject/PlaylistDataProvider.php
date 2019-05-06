<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class PlaylistDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider */
    protected $tracks;

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

    /** @var string */
    protected $description;

    /** @var \SpotifyApiConnect\Domain\DataTransferObject\FollowersDataProvider */
    protected $followers;

    /** @var bool */
    protected $public;


    /**
     * @return \SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider
     */
    public function getTracks(): ?\SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider
    {
        return $this->tracks;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider $tracks
     * @return PlaylistDataProvider
     */
    public function setTracks(?\SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider $tracks = null)
    {
        $this->tracks = $tracks;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
     */
    public function unsetTracks()
    {
        $this->tracks = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTracks()
    {
        return ($this->tracks !== null && $this->tracks !== []);
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\PlaylistTracksDataProvider $track
     * @return PlaylistDataProvider
     */
    public function addtrack(PlaylistTracksDataProvider $track)
    {
        $this->tracks[] = $track; return $this;
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
     * @return PlaylistDataProvider
     */
    public function setExternal_urls(?\SpotifyApiConnect\Domain\DataTransferObject\ExternalUrlDataProvider $external_urls = null)
    {
        $this->external_urls = $external_urls;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
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
     * @return PlaylistDataProvider
     */
    public function setId(?string $id = null)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
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
     * @return PlaylistDataProvider
     */
    public function setUri(?string $uri = null)
    {
        $this->uri = $uri;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
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
     * @return PlaylistDataProvider
     */
    public function setType(?string $type = null)
    {
        $this->type = $type;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
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
     * @return PlaylistDataProvider
     */
    public function setName(?string $name = null)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
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
     * @return PlaylistDataProvider
     */
    public function setHref(?string $href = null)
    {
        $this->href = $href;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
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
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }


    /**
     * @param string $description
     * @return PlaylistDataProvider
     */
    public function setDescription(?string $description = null)
    {
        $this->description = $description;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
     */
    public function unsetDescription()
    {
        $this->description = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasDescription()
    {
        return ($this->description !== null && $this->description !== []);
    }


    /**
     * @return \SpotifyApiConnect\Domain\DataTransferObject\FollowersDataProvider
     */
    public function getFollowers(): ?\SpotifyApiConnect\Domain\DataTransferObject\FollowersDataProvider
    {
        return $this->followers;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\FollowersDataProvider $followers
     * @return PlaylistDataProvider
     */
    public function setFollowers(?\SpotifyApiConnect\Domain\DataTransferObject\FollowersDataProvider $followers = null)
    {
        $this->followers = $followers;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
     */
    public function unsetFollowers()
    {
        $this->followers = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasFollowers()
    {
        return ($this->followers !== null && $this->followers !== []);
    }


    /**
     * @return bool
     */
    public function getPublic(): ?bool
    {
        return $this->public;
    }


    /**
     * @param bool $public
     * @return PlaylistDataProvider
     */
    public function setPublic(?bool $public = null)
    {
        $this->public = $public;

        return $this;
    }


    /**
     * @return PlaylistDataProvider
     */
    public function unsetPublic()
    {
        $this->public = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasPublic()
    {
        return ($this->public !== null && $this->public !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'tracks' =>
          array (
            'name' => 'tracks',
            'allownull' => true,
            'default' => '',
            'type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\PlaylistTracksDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
            'singleton' => 'track',
            'singleton_type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\PlaylistTracksDataProvider',
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
          'description' =>
          array (
            'name' => 'description',
            'allownull' => true,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'followers' =>
          array (
            'name' => 'followers',
            'allownull' => true,
            'default' => '',
            'type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\FollowersDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
          'public' =>
          array (
            'name' => 'public',
            'allownull' => true,
            'default' => '',
            'type' => 'bool',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
