<?php

namespace App\Services\Pricing;

use App\Models\RatePlan;
use App\Models\Unit;
use Carbon\Carbon;

class PricingService
{
    public function calculate(
        Unit $unit,
        RatePlan $ratePlan,
        Carbon $checkIn,
        Carbon $checkOut,
        array $context = []
    ): float {

        $price = (float) $ratePlan->base_price;

        // Future:
        // Seasons
        // Pricing Rules
        // Promotions
        // Taxes
        // Channel pricing

        return $price;
    }
}