<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class TrackSearchRequestDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $type = 'track';

    /** @var string */
    protected $resultType = 'tracks';

    /** @var string */
    protected $track;

    /** @var string */
    protected $artist;


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    /**
     * @param string $type
     * @return TrackSearchRequestDataProvider
     */
    public function setType(string $type = 'track')
    {
        $this->type = $type;

        return $this;
    }


    /**
     * @return TrackSearchRequestDataProvider
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
    public function getResultType(): string
    {
        return $this->resultType;
    }


    /**
     * @param string $resultType
     * @return TrackSearchRequestDataProvider
     */
    public function setResultType(string $resultType = 'tracks')
    {
        $this->resultType = $resultType;

        return $this;
    }


    /**
     * @return TrackSearchRequestDataProvider
     */
    public function unsetResultType()
    {
        $this->resultType = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasResultType()
    {
        return ($this->resultType !== null && $this->resultType !== []);
    }


    /**
     * @return string
     */
    public function getTrack(): string
    {
        return $this->track;
    }


    /**
     * @param string $track
     * @return TrackSearchRequestDataProvider
     */
    public function setTrack(string $track)
    {
        $this->track = $track;

        return $this;
    }


    /**
     * @return TrackSearchRequestDataProvider
     */
    public function unsetTrack()
    {
        $this->track = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTrack()
    {
        return ($this->track !== null && $this->track !== []);
    }


    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }


    /**
     * @param string $artist
     * @return TrackSearchRequestDataProvider
     */
    public function setArtist(string $artist)
    {
        $this->artist = $artist;

        return $this;
    }


    /**
     * @return TrackSearchRequestDataProvider
     */
    public function unsetArtist()
    {
        $this->artist = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasArtist()
    {
        return ($this->artist !== null && $this->artist !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'type' =>
          array (
            'name' => 'type',
            'allownull' => false,
            'default' => 'track',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'resultType' =>
          array (
            'name' => 'resultType',
            'allownull' => false,
            'default' => 'tracks',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'track' =>
          array (
            'name' => 'track',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'artist' =>
          array (
            'name' => 'artist',
            'allownull' => false,
            'default' => '',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
