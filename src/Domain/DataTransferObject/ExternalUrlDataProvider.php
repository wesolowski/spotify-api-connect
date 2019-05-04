<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class ExternalUrlDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $spotify;


    /**
     * @return string
     */
    public function getSpotify(): ?string
    {
        return $this->spotify;
    }


    /**
     * @param string $spotify
     * @return ExternalUrlDataProvider
     */
    public function setSpotify(?string $spotify = null)
    {
        $this->spotify = $spotify;

        return $this;
    }


    /**
     * @return ExternalUrlDataProvider
     */
    public function unsetSpotify()
    {
        $this->spotify = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasSpotify()
    {
        return ($this->spotify !== null && $this->spotify !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'spotify' =>
          array (
            'name' => 'spotify',
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
