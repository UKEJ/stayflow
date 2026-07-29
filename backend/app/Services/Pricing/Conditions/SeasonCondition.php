<?php

namespace App\Services\Pricing\Conditions;

use App\DataTransferObjects\PricingContext;
use App\Models\PricingRule;
use App\Models\Season;
use Carbon\Carbon;

class SeasonCondition implements Condition
{
    public function key(): string
    {
        return 'season';
    }

    public function passes(
        PricingRule $rule,
        PricingContext $context,
        Carbon $date
    ): bool {

        $conditions = $rule->conditions ?? [];

        if (! isset($conditions['season'])) {
            return true;
        }

        return Season::query()
            ->where('property_id', $context->unit->property_id)
            ->where('name', $conditions['season'])
            ->where('is_active', true)
            ->whereDate('start_date', '<=', $date)
            ->whereDate('end_date', '>=', $date)
            ->exists();
    }
}