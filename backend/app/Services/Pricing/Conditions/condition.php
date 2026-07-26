<?php

namespace App\Services\Pricing\Conditions;

use App\DataTransferObjects\PricingContext;
use App\Models\PricingRule;
use Carbon\Carbon;

interface Condition
{
    public function key(): string;

    public function passes(
        PricingRule $rule,
        PricingContext $context,
        Carbon $date
    ): bool;
}