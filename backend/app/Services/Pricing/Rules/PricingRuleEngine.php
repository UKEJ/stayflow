<?php

namespace App\Services\Pricing\Rules;

use App\DataTransferObjects\PricingContext;
use App\Models\PricingRule;
use Carbon\Carbon;

class PricingRuleEngine
{
    public function __construct(
        protected ConditionEvaluator $conditionEvaluator,
    ) {
    }

    public function apply(
    float $price,
    PricingContext $context,
    iterable $rules,
    Carbon $date
): float {

    foreach ($rules as $rule) {

        if (! $rule instanceof PricingRule) {
            continue;
        }

        if (! $rule->is_active) {
            continue;
        }

        if (! $this->conditionEvaluator->passes(
            $rule,
            $context,
            $date
        )) {
            continue;
        }

        $price = $this->applyRule($price, $rule);
    }

        return $price;
    }

    protected function applyRule(
        float $price,
        PricingRule $rule
    ): float {

        if ($rule->adjustment_type === 'percentage') {

            if ($rule->operator === 'add') {
                return $price + ($price * ($rule->adjustment_value / 100));
            }

            if ($rule->operator === 'subtract') {
                return $price - ($price * ($rule->adjustment_value / 100));
            }
        }

        if ($rule->adjustment_type === 'fixed') {

            if ($rule->operator === 'add') {
                return $price + $rule->adjustment_value;
            }

            if ($rule->operator === 'subtract') {
                return $price - $rule->adjustment_value;
            }

            if ($rule->operator === 'replace') {
                return $rule->adjustment_value;
            }
        }

        return $price;
    }
}