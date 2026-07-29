<?php

namespace App\Services\Pricing\Conditions;

use App\DataTransferObjects\PricingContext;
use App\Models\PricingRule;
use Carbon\Carbon;

class MinimumStayCondition implements Condition
{
    public function key(): string
    {
        return 'minimum_stay';
    }

    public function passes(
        PricingRule $rule,
        PricingContext $context,
        Carbon $date
    ): bool {

        $conditions = $rule->conditions ?? [];

        if (! isset($conditions['minimum_stay'])) {
            return true;
        }

        return $context->checkIn
            ->diffInDays($context->checkOut)
            >= $conditions['minimum_stay'];
    }
}