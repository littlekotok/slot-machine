<?php

namespace App\Entity;

use App\Collection;

class Paylines extends Collection
{
    /**
     * @param integer $num
     * @param array $points
     * @return $this
     */
    public function register(int $num, array $points)
    {
        $this->items[$num] = $points;

        return $this;
    }
}
