<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class FollowersDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $total;


    /**
     * @return int
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }


    /**
     * @param int $total
     * @return FollowersDataProvider
     */
    public function setTotal(?int $total = null)
    {
        $this->total = $total;

        return $this;
    }


    /**
     * @return FollowersDataProvider
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
        );
    }
}
