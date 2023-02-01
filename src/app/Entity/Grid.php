<?php

namespace App\Entity;

use Exception;
use App\Collection;

class Grid extends Collection
{
    public function __construct(array $items)
    {
        $this->items = array_values($items);

        if (15 != $this->count()) {
            throw new Exception('Need 15 symbols.');
        }
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function symbols(array $points): array
    {
        $items = [];

        foreach ($points as $args) {
            $items[] = $this->symbol(...$args);
        }

        return $items;
    }

    /**
     * Undocumented function
     *
     * @param integer $x
     * @param integer $y
     * @return string
     * @throws \Exception
     */
    public function symbol(int $x, int $y): string
    {
        if (!(($x > 0) && ($x < 6))) {
            throw new Exception('');
        }

        if (!(($y > 0) && ($y < 4))) {
            throw new Exception('');
        }

        $pos = (($y > 1) ? (($y - 1) * 5) : 0) + $x;

        $value = $this->items[$pos - 1] ?? null;

        if (!$value) {
            throw new Exception("Symbol [$x,$y] not found!");
        }

        return (string) $value;
    }

    public function __toString()
    {
        $output = '';

        $lines = array_chunk($this->items, 5);

        foreach ($lines as $symbols) {
            $output .= implode(',', $symbols) . PHP_EOL;
        }

        return $output;
    }
}
