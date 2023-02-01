<?php

namespace App\Entity;

use App\Collection;
use App\Concerns;

/**
 * Undocumented class
 * @property integer $max_values
 */
class Reel extends Collection
{
    use Concerns\HasAttributes;

    public function __construct(array $items, int $max_values = 3)
    {
        $this->items = $items;
        $this->max_values = $max_values;
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function values (): array
    {
        return array_slice($this->items, 0, $this->max_values);
    }

    /**
     * Undocumented function
     *
     * @return $this
     */
    public function spin()
    {
        // echo __METHOD__ . PHP_EOL;
        $offset = random_int(0, ($this->count() - 1));
        // echo "\$offset = $offset" . PHP_EOL;

        if ($offset > 0) {
            $this->items = array_values(array_merge(array_slice($this->items, $offset), array_slice($this->items, 0, $offset)));
        }    

        // var_dump($this->items);
        // echo 'FIN' . PHP_EOL;

        return $this;
    }
}
