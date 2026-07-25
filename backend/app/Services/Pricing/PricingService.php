<?php

namespace App\Services\Pricing;

use App\DataTransferObjects\PricingContext;
use App\DataTransferObjects\PricingResult;
use Carbon\Carbon;

class PricingService
{
    public function calculate(PricingContext $context): PricingResult
    {
        $subtotal = 0;

        $date = $context->checkIn->copy();

        while ($date->lt($context->checkOut)) {

            $subtotal += $this->nightlyRate(
                $context,
                $date
            );

            $date->addDay();
        }

        return new PricingResult(
            subtotal: $subtotal,
            discount: 0,
            tax: 0,
            total: $subtotal,
            breakdown: [],
        );
    }

    protected function nightlyRate(
        PricingContext $context,
        Carbon $date
    ): float {

        return (float) $context->ratePlan->base_price;
    }
}