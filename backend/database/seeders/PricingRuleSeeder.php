<?php

namespace Database\Seeders;

use App\Models\PricingRule;
use App\Models\RatePlan;
use Illuminate\Database\Seeder;

class PricingRuleSeeder extends Seeder
{
    public function run(): void
    {
        foreach (RatePlan::all() as $ratePlan) {

                PricingRule::create([
        'rate_plan_id' => $ratePlan->id,
        'name' => 'Weekend Surcharge',
        'rule_type' => 'price_adjustment',
        'adjustment_type' => 'percentage',
        'operator' => 'add',
        'adjustment_value' => 10,
        'conditions' => [
            'days' => [
                'Friday',
                'Saturday',
            ],
            'minimum_stay' => 2,
        ],
        'priority' => 1,
        'is_active' => true,
    ]);

    PricingRule::create([
        'rate_plan_id' => $ratePlan->id,
        'name' => 'Peak Season Increase',
        'rule_type' => 'price_adjustment',
        'adjustment_type' => 'percentage',
        'operator' => 'add',
        'adjustment_value' => 20,
        'conditions' => [
            'season' => 'Peak Season',
        ],
        'priority' => 2,
        'is_active' => true,
    ]);

        }
    }
}