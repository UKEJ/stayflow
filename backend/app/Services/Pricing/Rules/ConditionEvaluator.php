<?php

namespace App\Services\Pricing\Rules;

use App\DataTransferObjects\PricingContext;
use App\Models\PricingRule;
use Carbon\Carbon;

class ConditionEvaluator
{
    public function passes(
        PricingRule $rule,
        PricingContext $context,
        Carbon $date
    ): bool {

        $conditions = $rule->conditions ?? [];

        if (empty($conditions)) {
            return true;
        }

        if (isset($conditions['days'])) {

            $today = strtolower($date->format('l'));

            return in_array(
                $today,
                array_map('strtolower', $conditions['days']),
                true
            );
        }

        return true;
    }
}