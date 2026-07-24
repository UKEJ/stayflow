<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\UnitType;
use Illuminate\Database\Seeder;

class UnitTypeSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Property::all() as $property) {

            UnitType::create([
                'property_id' => $property->id,
                'name' => 'Standard Room',
                'description' => 'Standard guest room',
                'is_active' => true,
            ]);

            UnitType::create([
                'property_id' => $property->id,
                'name' => 'Deluxe Room',
                'description' => 'Deluxe guest room',
                'is_active' => true,
            ]);

            UnitType::create([
                'property_id' => $property->id,
                'name' => 'Executive Suite',
                'description' => 'Executive suite',
                'is_active' => true,
            ]);
        }
    }
}