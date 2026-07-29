<?php

namespace App\Services\Pricing\Rules;

use App\DataTransferObjects\PricingContext;
use App\Models\PricingRule;
use App\Services\Pricing\Conditions\ConditionRegistry;
use Carbon\Carbon;

class ConditionEvaluator
{
    public function __construct(
        protected ConditionRegistry $registry,
    ) {
    }

    public function passes(
        PricingRule $rule,
        PricingContext $context,
        Carbon $date
    ): bool {

        foreach ($this->registry->all() as $condition) {

            $key = $condition->key();

            if (! isset(($rule->conditions ?? [])[$key])) {
                continue;
            }

            if (! $condition->passes($rule, $context, $date)) {
                return false;
            }
        }

        return true;
    }
}