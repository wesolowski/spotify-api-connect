<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class TracksSearchDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider[] */
    protected $items = [];

    /** @var int */
    protected $limit;

    /** @var int */
    protected $next;

    /** @var int */
    protected $offset;

    /** @var int */
    protected $previous;

    /** @var int */
    protected $total;


    /**
     * @return \SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider[]
     */
    public function getItems(): ?array
    {
        return $this->items;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider[] $items
     * @return TracksSearchDataProvider
     */
    public function setItems(?array $items = null)
    {
        $this->items = $items;

        return $this;
    }


    /**
     * @return TracksSearchDataProvider
     */
    public function unsetItems()
    {
        $this->items = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasItems()
    {
        return ($this->items !== null && $this->items !== []);
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\TrackDataProvider $item
     * @return TracksSearchDataProvider
     */
    public function additem(TrackDataProvider $item)
    {
        $this->items[] = $item; return $this;
    }


    /**
     * @return int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }


    /**
     * @param int $limit
     * @return TracksSearchDataProvider
     */
    public function setLimit(?int $limit = null)
    {
        $this->limit = $limit;

        return $this;
    }


    /**
     * @return TracksSearchDataProvider
     */
    public function unsetLimit()
    {
        $this->limit = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasLimit()
    {
        return ($this->limit !== null && $this->limit !== []);
    }


    /**
     * @return int
     */
    public function getNext(): ?int
    {
        return $this->next;
    }


    /**
     * @param int $next
     * @return TracksSearchDataProvider
     */
    public function setNext(?int $next = null)
    {
        $this->next = $next;

        return $this;
    }


    /**
     * @return TracksSearchDataProvider
     */
    public function unsetNext()
    {
        $this->next = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasNext()
    {
        return ($this->next !== null && $this->next !== []);
    }


    /**
     * @return int
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }


    /**
     * @param int $offset
     * @return TracksSearchDataProvider
     */
    public function setOffset(?int $offset = null)
    {
        $this->offset = $offset;

        return $this;
    }


    /**
     * @return TracksSearchDataProvider
     */
    public function unsetOffset()
    {
        $this->offset = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasOffset()
    {
        return ($this->offset !== null && $this->offset !== []);
    }


    /**
     * @return int
     */
    public function getPrevious(): ?int
    {
        return $this->previous;
    }


    /**
     * @param int $previous
     * @return TracksSearchDataProvider
     */
    public function setPrevious(?int $previous = null)
    {
        $this->previous = $previous;

        return $this;
    }


    /**
     * @return TracksSearchDataProvider
     */
    public function unsetPrevious()
    {
        $this->previous = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasPrevious()
    {
        return ($this->previous !== null && $this->previous !== []);
    }


    /**
     * @return int
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }


    /**
     * @param int $total
     * @return TracksSearchDataProvider
     */
    public function setTotal(?int $total = null)
    {
        $this->total = $total;

        return $this;
    }


    /**
     * @return TracksSearchDataProvider
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
          'items' =>
          array (
            'name' => 'items',
            'allownull' => true,
            'default' => '',
            'type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\TrackDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'item',
            'singleton_type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\TrackDataProvider',
          ),
          'limit' =>
          array (
            'name' => 'limit',
            'allownull' => true,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'next' =>
          array (
            'name' => 'next',
            'allownull' => true,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'offset' =>
          array (
            'name' => 'offset',
            'allownull' => true,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'previous' =>
          array (
            'name' => 'previous',
            'allownull' => true,
            'default' => '',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
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
