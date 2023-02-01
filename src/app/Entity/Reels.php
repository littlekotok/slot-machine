<?php

namespace App\Entity;

use App\Collection;
use App\Entity\Grid;
use App\Entity\Reel;
use App\Concerns;

/**
 * @property \App\Entity\Grid $grid
 */
class Reels extends Collection
{
    use Concerns\HasAttributes;

    /**
     * @param \App\Entity\Reel|array $item
     * @return $this
     */
    public function push(Reel|array $item)
    {
        $this->items[] = $this->resolveItem($item);

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return $this
     */
    public function spin()
    {
        // Reset grid
        $this->grid = null;

        foreach ($this->items as &$item) {
            $item->{__FUNCTION__}();
        }

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function values(): array
    {
        $values = [];

        foreach ($this->items as &$item) {
            $values[] = $item->values();
        }

        return $values;
    }

    /**
     * Undocumented function
     *
     * @return \App\Entity\Grid
     */
    public function grid(): Grid
    {
        if ($this->grid instanceof Grid) {
            return $this->grid;
        }

        $data = [];
        // echo __METHOD__ . PHP_EOL;
        $x = 1;
        foreach ($this->items as $item) {

            $values = $item->values();
            // echo "\$x = $x" . PHP_EOL;
            // var_dump($values);

            $y = 1;
            foreach ($values as $values) {
                $pos = (($y > 1) ? (($y - 1) * 5) : 0) + $x;
                $data[$pos] = $values;
                $y++;
            }
            $x++;
        }

        ksort($data);

        return $this->grid = new Grid($data);
    }

    /**
     * Undocumented function
     *
     * @param \App\Entity\Reel|array $item
     * @return \App\Entity\Reel
     */
    protected function resolveItem(Reel|array $item): Reel
    {
        return is_array($item) ? (new Reel($item)) : $item;
    }
}
