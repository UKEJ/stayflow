<?php

namespace App\Services\Pricing;

use App\DataTransferObjects\NightlyPrice;
use App\DataTransferObjects\PricingContext;
use App\DataTransferObjects\PricingResult;
use App\Models\PricingRule;
use App\Services\Pricing\Rules\PricingRuleEngine;
use Carbon\Carbon;

class PricingService
{
    public function __construct(
        protected PricingRuleEngine $ruleEngine,
    ) {
    }

    public function calculate(PricingContext $context): PricingResult
    {
        $subtotal = 0;
        $total = 0;
        $nights = [];

        $rules = PricingRule::query()
            ->where('rate_plan_id', $context->ratePlan->id)
            ->where('is_active', true)
            ->orderBy('priority')
            ->get();

        $date = $context->checkIn->copy();

        while ($date->lt($context->checkOut)) {

            $basePrice = (float) $context->ratePlan->base_price;

            $finalPrice = $this->ruleEngine->apply(
                $basePrice,
                $context,
                $rules,
                $date
            );

            $nights[] = new NightlyPrice(
                date: $date->copy(),
                basePrice: $basePrice,
                finalPrice: $finalPrice,
                appliedRules: [],
            );

            $subtotal += $basePrice;
            $total += $finalPrice;

            $date->addDay();
        }

        return new PricingResult(
            subtotal: $subtotal,
            discount: 0,
            tax: 0,
            total: $total,
            nights: $nights,
            breakdown: [],
        );
    }
}