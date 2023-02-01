<?php

namespace App\Entity;

use App\Collection;

class Paytable extends Collection
{
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function payout(string $symbol, int $hit): int
    {
        return (int) ($this->items[$symbol][$hit] ?? 0);
    }
}
