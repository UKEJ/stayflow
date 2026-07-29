<?php

namespace App\Services\Pricing\Conditions;

class ConditionRegistry
{
    /**
     * @return Condition[]
     */
    public function all(): array
    {
        return [
            use App\Services\Pricing\Conditions\DayOfWeekCondition;
            use App\Services\Pricing\Conditions\MinimumStayCondition;
            use App\Services\Pricing\Conditions\SeasonCondition;
        ];

        return [
            new DayOfWeekCondition(),
            new MinimumStayCondition(),
            new SeasonCondition(),
        ];
    }
}