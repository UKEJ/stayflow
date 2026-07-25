<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\RatePlan;
use Illuminate\Database\Seeder;

class RatePlanSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Property::all() as $property) {

            RatePlan::create([
                'property_id' => $property->id,
                'name' => 'Standard Rate',
                'code' => 'STANDARD',
                'description' => 'Default selling rate.',
                'base_price' => 50000,
                'currency' => 'NGN',
                'is_active' => true,
            ]);

            RatePlan::create([
                'property_id' => $property->id,
                'name' => 'Corporate Rate',
                'code' => 'CORPORATE',
                'description' => 'Corporate negotiated rate.',
                'base_price' => 45000,
                'currency' => 'NGN',
                'is_active' => true,
            ]);

            RatePlan::create([
                'property_id' => $property->id,
                'name' => 'Weekend Rate',
                'code' => 'WEEKEND',
                'description' => 'Weekend promotional rate.',
                'base_price' => 55000,
                'currency' => 'NGN',
                'is_active' => true,
            ]);
        }
    }
}