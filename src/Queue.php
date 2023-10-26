<?php

/**
 * Queue
 *
 * A first-in, first-out data structure
 */
class Queue
{

    /**
     * @var integer
     */
    public const MAX_ITEMS_NUMBER = 4;

    /**
     * Queue items
     * @var array
     */
    protected $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }
    /**
     * Add an item to the end of the queue
     *
     * @param mixed $item The item
     */
    public function push($item)
    {
        if($this->getCount() > static::MAX_ITEMS_NUMBER) {
            throw new Exception("Queue is full"); 
        }
        $this->items[] = $item;
    }

    /**
     * Take an item off the head of the queue
     *
     * @return mixed The item
     */
    public function pop()
    {
        return array_shift($this->items);
    }

    /**
     * Get the total number of items in the queue
     *
     * @return integer The number of items
     */
    public function getCount()
    {
        return count($this->items);
    }

    public function clear()
    {
        $this->items = [];
    }
}
