<?php

namespace App;

abstract class Collection
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @return array
     */
    public function all(): array
    {
        return (array) $this->items;
    }

    /**
     * @return integer
     */
    public function count(): int
    {
        return count($this->items);
    }
}
