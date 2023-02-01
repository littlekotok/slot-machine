<?php

namespace App\Entity;

use App\Entity\Grid;
use App\Entity\Paylines;
use App\Entity\Paytable;
use App\Concerns;

/**
 * @property \App\Entity\Grid $grid
 * @property \App\Entity\Paytable $paytable
 * @property \App\Entity\Paylines $paylines
 * @property array $explains
 */
class Payout
{
    use Concerns\HasAttributes;

    /**
     * @param \App\Entity\Grid $rollers
     * @param \App\Entity\Paytable $paytable
     * @param \App\Entity\Paylines $paylines
     */
    public function __construct(Grid $grid, Paytable $paytable, Paylines $paylines)
    {
        $this->grid = $grid;
        $this->paytable = $paytable;
        $this->paylines = $paylines;
    }

    /**
     * Return the gain for the given bet
     *
     * @param integer $value
     * @return integer
     */
    public function bet(int $value): int
    {
        $gain = 0;

        $explains = [];

        foreach ($this->paylines->all() as $num => $points) {

            $symbols = $this->grid->symbols($points);

            $count_symbols = array_count_values($symbols);

            $gain_line = 0;
            $result_line = [];

            foreach ($count_symbols as $symbol => $hit) {

                $gain_symbol = ($value * $this->paytable->payout($symbol, $hit));

                if ($gain_symbol > 0) {

                    $gain_line += $gain_symbol;

                    $result_line[$symbol] = [
                        'hit' => $hit,
                        'gain' => $gain_symbol,
                        'items' => $symbols,
                    ];
                }
            }

            if ($gain_line > 0) {

                $gain += $gain_line;

                $explains[$num] = $result_line;
            }
        }

        $this->explains = $explains;

        return $gain;
    }
}
