<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BusinessSeeder::class,
            PropertySeeder::class,
            UnitTypeSeeder::class,
            UnitSeeder::class,
            GuestSeeder::class,
            RatePlanSeeder::class,
            ReservationSeeder::class,
            SeasonSeeder::class,
            PricingRuleSeeder::class,
        ]);
    }
}