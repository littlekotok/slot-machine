<?php

use App\Entity\Paylines;
use App\Entity\Paytable;
use App\Entity\Reels;
use App\Entity\Slot;

$reels = (new Reels)->push([
    'cherry',
    'grape',
    'watermelon',
    'diamond',
    'lemon',
    'horseshoe',
    'clover',
    'seven',
    'bell',
])->push([
    'bell',
    'grape',
    'diamond',
    'watermelon',
    'cherry',
    'clover',
    'horseshoe',
    'lemon',
    'seven',
])->push([
    'grape',
    'bell',
    'seven',
    'cherry',
    'clover',
    'horseshoe',
    'watermelon',
    'lemon',
    'diamond',
])->push([
    'bell',
    'clover',
    'diamond',
    'seven',
    'cherry',
    'lemon',
    'horseshoe',
    'grape',
    'watermelon',
])->push([
    'horseshoe',
    'seven',
    'grape',
    'watermelon',
    'diamond',
    'clover',
    'bell',
    'lemon',
    'cherry',
]);

$paytable = new Paytable([
    'seven' => [
        5 => 500,
        4 => 300,
        3 => 100,
        2 => 4,
    ],
    'diamond' => [
        5 => 400,
        4 => 200,
        3 => 40,
        2 => 2,
    ],
    'horseshoe' => [
        5 => 300,
        4 => 150,
        3 => 30,
    ],
    'clover' => [
        5 => 250,
        4 => 100,
        3 => 20,
    ],
    'bell' => [
        5 => 200,
        4 => 75,
        3 => 20,
    ],
    // Fruits
    'watermelon' => [
        5 => 160,
        4 => 50,
        3 => 10,
    ],
    'grape' => [
        5 => 140,
        4 => 40,
        3 => 10,
    ],
    'lemon' => [
        5 => 120,
        4 => 30,
        3 => 5,
    ],
    'cherry' => [
        5 => 100,
        4 => 20,
        3 => 5,
    ],
]);

$paylines = (new Paylines())
    ->register(1, [
        [1, 2],
        [2, 2],
        [3, 2],
        [4, 2],
        [5, 2],
    ])
    ->register(2, [
        [1, 1],
        [2, 1],
        [3, 1],
        [4, 1],
        [5, 1],
    ])
    ->register(3, [
        [1, 3],
        [2, 3],
        [3, 3],
        [4, 3],
        [5, 3],
    ])
    ->register(4, [
        [1, 1],
        [2, 2],
        [3, 3],
        [4, 2],
        [5, 1],
    ])
    ->register(5, [
        [1, 3],
        [2, 2],
        [3, 1],
        [4, 2],
        [5, 3],
    ]);

return new Slot($reels, $paytable, $paylines);
