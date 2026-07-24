<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Unit;
use App\Models\UnitType;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $layout = [
            [
                'type' => 'Standard Room',
                'start' => 101,
                'count' => 10,
            ],
            [
                'type' => 'Deluxe Room',
                'start' => 201,
                'count' => 10,
            ],
            [
                'type' => 'Executive Suite',
                'start' => 301,
                'count' => 10,
            ],
        ];

        foreach (Property::all() as $property) {

            foreach ($layout as $config) {

                $unitType = UnitType::where('property_id', $property->id)
                    ->where('name', $config['type'])
                    ->first();

                if (! $unitType) {
                    continue;
                }

                for ($i = 0; $i < $config['count']; $i++) {

                    $roomNumber = $config['start'] + $i;

                    Unit::create([
                        'property_id' => $property->id,
                        'unit_type_id' => $unitType->id,
                        'identifier' => (string) $roomNumber,
                        'name' => "Room {$roomNumber}",
                        'is_active' => true,
                    ]);
                }
            }
        }
    }
}