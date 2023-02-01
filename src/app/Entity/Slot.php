<?php

namespace App\Entity;

use App\Entity\Reels;
use App\Entity\Payout;
use App\Entity\Paytable;
use App\Concerns;

/**
 * @property \App\Entity\Reels $reels
 * @property \App\Entity\Paytable $paytable
 * @property \App\Entity\Paylines $paylines
 * @property \App\Entity\Payout|null $payout
 * @property \App\Entity\Grid|null $grid
 */
class Slot
{
    use Concerns\HasAttributes;

    /**
     * @param \App\Entity\Reels $reels
     * @param \App\Entity\Paytable $paytable
     * @param \App\Entity\Paylines $paylines
     */
    public function __construct(Reels $reels, Paytable $paytable, Paylines $paylines)
    {
        $this->reels = $reels;
        $this->paytable = $paytable;
        $this->paylines = $paylines;
        $this->bet = 0;
    }

    /**
     * Undocumented function
     *
     * @param integer $value
     * @return $this
     */
    public function bet(int $value)
    {
        $this->bet = $value;

        return $this;
    }

    /**
     * Spin rollers
     *
     * @return integer
     */
    public function spin(): int
    {
        $this->payout = new Payout($this->grid = $this->reels->spin()->grid(), $this->paytable, $this->paylines);

        return $this->payout->bet($this->bet);
    }
}
