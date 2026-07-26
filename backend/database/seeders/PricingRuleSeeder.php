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
        ],
        'priority' => 1,
        'is_active' => true,
    ]);

        }
    }
}