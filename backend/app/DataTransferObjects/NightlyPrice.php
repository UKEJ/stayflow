<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;

class NightlyPrice
{
    public function __construct(
        public Carbon $date,
        public float $basePrice,
        public float $finalPrice,
        public array $appliedRules = [],
    ) {
    }
} 