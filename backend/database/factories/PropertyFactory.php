<?php

namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [

            'business_id' => Business::factory(),

            'name' => fake()->company() . ' Hotel',

            'slug' => fake()->unique()->slug(),

            'email' => fake()->companyEmail(),

            'phone' => fake()->phoneNumber(),

            'country' => 'Nigeria',

            'state' => fake()->state(),

            'city' => fake()->city(),

            'address' => fake()->address(),

            'is_active' => true,
        ];
    }
}