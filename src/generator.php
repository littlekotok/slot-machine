<?php

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * @var \App\Entity\Slot $slot
 */
$slot = include_once(__DIR__ . '/config/slot.php');

$loop = 10000;

$lucky = 0;

while ((--$loop) > 0) {

    if ($gain = $slot->bet(1)->spin()) {

        echo $slot->grid;
        echo str_repeat('-', 5) . PHP_EOL;

        // var_dump($slot->payout->explains);
        if (true
            && isset($slot->payout->explains[4])
            && isset($slot->payout->explains[4]['seven'])
            && ($slot->payout->explains[4]['seven']['hit'] > 2)
            && isset($slot->payout->explains[5])
            && isset($slot->payout->explains[5]['seven'])
            && ($slot->payout->explains[5]['seven']['hit'] > 2)
            ) {
                // echo $slot->grid;
                // echo str_repeat('-', 5) . PHP_EOL;
                // exit;
                $lucky++;
        }
    }
}

var_dump($lucky);