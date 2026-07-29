<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Season;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Property::all() as $property) {

            Season::create([
                'property_id' => $property->id,
                'name' => 'Peak Season',
                'start_date' => '2026-12-15',
                'end_date' => '2027-01-05',
                'is_active' => true,
            ]);

            Season::create([
                'property_id' => $property->id,
                'name' => 'Low Season',
                'start_date' => '2026-09-01',
                'end_date' => '2026-11-30',
                'is_active' => true,
            ]);
        }
    }
}