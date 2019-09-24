<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class PlaylistTracksDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \SpotifyApiConnect\Domain\DataTransferObject\ItemDataProvider[] */
    protected $items = [];

    /** @var int */
    protected $limit;

    /** @var string */
    protected $next;

    /** @var int */
    protected $offset;

    /** @var int */
    protected $previous;

    /** @var int */
    protected $total;


    /**
     * @return \SpotifyApiConnect\Domain\DataTransferObject\ItemDataProvider[]
     */
    public function getItems(): ?array
    {
        return $this->items;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\ItemDataProvider[] $items
     * @return PlaylistTracksDataProvider
     */
    public function setItems(?array $items = null)
    {
        $this->items = $items;

        return $this;
    }


    /**
     * @return PlaylistTracksDataProvider
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
     * @param \SpotifyApiConnect\Domain\DataTransferObject\ItemDataProvider $item
     * @return PlaylistTracksDataProvider
     */
    public function additem(ItemDataProvider $item)
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
     * @return PlaylistTracksDataProvider
     */
    public function setLimit(?int $limit = null)
    {
        $this->limit = $limit;

        return $this;
    }


    /**
     * @return PlaylistTracksDataProvider
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
     * @return string
     */
    public function getNext(): ?string
    {
        return $this->next;
    }


    /**
     * @param string $next
     * @return PlaylistTracksDataProvider
     */
    public function setNext(?string $next = null)
    {
        $this->next = $next;

        return $this;
    }


    /**
     * @return PlaylistTracksDataProvider
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
     * @return PlaylistTracksDataProvider
     */
    public function setOffset(?int $offset = null)
    {
        $this->offset = $offset;

        return $this;
    }


    /**
     * @return PlaylistTracksDataProvider
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
     * @return PlaylistTracksDataProvider
     */
    public function setPrevious(?int $previous = null)
    {
        $this->previous = $previous;

        return $this;
    }


    /**
     * @return PlaylistTracksDataProvider
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
     * @return PlaylistTracksDataProvider
     */
    public function setTotal(?int $total = null)
    {
        $this->total = $total;

        return $this;
    }


    /**
     * @return PlaylistTracksDataProvider
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
            'type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\ItemDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'item',
            'singleton_type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\ItemDataProvider',
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
            'type' => 'string',
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
