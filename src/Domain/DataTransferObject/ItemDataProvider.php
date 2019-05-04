<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class ItemDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider */
    protected $track;


    /**
     * @return \SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider
     */
    public function getTrack(): ?\SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider
    {
        return $this->track;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider $track
     * @return ItemDataProvider
     */
    public function setTrack(?\SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider $track = null)
    {
        $this->track = $track;

        return $this;
    }


    /**
     * @return ItemDataProvider
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
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'track' =>
          array (
            'name' => 'track',
            'allownull' => true,
            'default' => '',
            'type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\TrackDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
        );
    }
}
