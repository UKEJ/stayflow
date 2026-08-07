<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;

class NightlyPrice
{
    public function __construct(
        public Carbon $date,     git 
        public float $basePrice,     
        public float $finalPrice,
        public array $appliedRules = [],
    ) {
    }
}     