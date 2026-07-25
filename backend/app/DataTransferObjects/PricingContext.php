<?php

namespace App\DataTransferObjects;

use App\Models\Guest;
use App\Models\RatePlan;
use App\Models\Unit;
use Carbon\Carbon;

class PricingContext
{
    public function __construct(
        public Unit $unit,
        public Guest $guest,
        public RatePlan $ratePlan,
        public Carbon $checkIn,
        public Carbon $checkOut,
        public int $adults = 1,
        public int $children = 0,
        public array $attributes = [],
    ) {
    }
}