<?php

namespace itays_elementor_core;

const SIZE_UNITS = [
    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
    'range' => [
        'px' => [
            'min' => 0,
            'max' => 1000,
            'step' => 5,
        ],
        'em' => [
            'min' => 0,
            'max' => 100,
            'step' => 0.5,
        ],
        '%' => [
            'min' => 0,
            'max' => 100,
        ],
    ],
    'default' => [
        'unit' => 'px',
        'size' => 5,
    ],
];

