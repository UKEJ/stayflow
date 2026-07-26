<?php

namespace App\DataTransferObjects;

class PricingResult
{
    public function __construct(
        public float $subtotal,
        public float $discount = 0,
        public float $tax = 0,
        public float $total = 0,

        /**
         * @var NightlyPrice[]
         */
        public array $nights = [],

        public array $breakdown = [],
    ) {
    }
}