<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Guest;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        $business = Business::first();

        Guest::factory()
            ->count(50)
            ->create([
                'business_id' => $business->id,
            ]);
    }
}