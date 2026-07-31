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
            new DayOfWeekCondition(),
            new MinimumStayCondition(),
            new SeasonCondition(),
        ];
    }
}