<?php
declare(strict_types=1);
namespace SpotifyApiConnect\Domain\DataTransferObject;

/**
 * Auto generated data provider
 */
final class UserPlaylistsDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \SpotifyApiConnect\Domain\DataTransferObject\PlaylistDataProvider[] */
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
     * @return \SpotifyApiConnect\Domain\DataTransferObject\PlaylistDataProvider[]
     */
    public function getItems(): ?array
    {
        return $this->items;
    }


    /**
     * @param \SpotifyApiConnect\Domain\DataTransferObject\PlaylistDataProvider[] $items
     * @return UserPlaylistsDataProvider
     */
    public function setItems(?array $items = null)
    {
        $this->items = $items;

        return $this;
    }


    /**
     * @return UserPlaylistsDataProvider
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
     * @param \SpotifyApiConnect\Domain\DataTransferObject\PlaylistDataProvider $item
     * @return UserPlaylistsDataProvider
     */
    public function additem(PlaylistDataProvider $item)
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
     * @return UserPlaylistsDataProvider
     */
    public function setLimit(?int $limit = null)
    {
        $this->limit = $limit;

        return $this;
    }


    /**
     * @return UserPlaylistsDataProvider
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
     * @return UserPlaylistsDataProvider
     */
    public function setNext(?string $next = null)
    {
        $this->next = $next;

        return $this;
    }


    /**
     * @return UserPlaylistsDataProvider
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
     * @return UserPlaylistsDataProvider
     */
    public function setOffset(?int $offset = null)
    {
        $this->offset = $offset;

        return $this;
    }


    /**
     * @return UserPlaylistsDataProvider
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
     * @return UserPlaylistsDataProvider
     */
    public function setPrevious(?int $previous = null)
    {
        $this->previous = $previous;

        return $this;
    }


    /**
     * @return UserPlaylistsDataProvider
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
     * @return UserPlaylistsDataProvider
     */
    public function setTotal(?int $total = null)
    {
        $this->total = $total;

        return $this;
    }


    /**
     * @return UserPlaylistsDataProvider
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
            'type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\PlaylistDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'item',
            'singleton_type' => '\\SpotifyApiConnect\\Domain\\DataTransferObject\\PlaylistDataProvider',
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
