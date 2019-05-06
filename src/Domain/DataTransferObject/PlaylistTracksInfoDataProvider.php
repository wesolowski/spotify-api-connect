<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class PlaylistTracksInfoDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $total;

    /** @var string */
    protected $href;


    /**
     * @return int
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }


    /**
     * @param int $total
     * @return PlaylistTracksInfoDataProvider
     */
    public function setTotal(?int $total = null)
    {
        $this->total = $total;

        return $this;
    }


    /**
     * @return PlaylistTracksInfoDataProvider
     */
    public function unsetTotal()
    {
        $this->total = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTotal()
    {
        return ($this->total !== null && $this->total !== []);
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
     * @return PlaylistTracksInfoDataProvider
     */
    public function setHref(?string $href = null)
    {
        $this->href = $href;

        return $this;
    }


    /**
     * @return PlaylistTracksInfoDataProvider
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
          'total' =>
          array (
            'name' => 'total',
            'allownull' => true,
            'default' => '',
            'type' => 'int',
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
