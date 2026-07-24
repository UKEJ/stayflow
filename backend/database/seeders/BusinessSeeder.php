<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    public function run(): void
    {
        Business::factory()->create([
            'name' => 'Royal Palace Hotels',
            'slug' => 'royal-palace-hotels',
            'industry' => 'hotel',
            'country' => 'Nigeria',
        ]);
    }
}
