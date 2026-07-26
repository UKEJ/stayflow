<?php

namespace App\Services\Pricing\Conditions;

use App\DataTransferObjects\PricingContext;
use App\Models\PricingRule;
use Carbon\Carbon;

class DayOfWeekCondition implements Condition
{
    public function key(): string
    {
        return 'days';
    }

    public function passes(
        PricingRule $rule,
        PricingContext $context,
        Carbon $date
    ): bool {

        $conditions = $rule->conditions ?? [];

        if (! isset($conditions['days'])) {
            return true;
        }

        return in_array(
            strtolower($date->format('l')),
            array_map('strtolower', $conditions['days']),
            true
        );
    }
}