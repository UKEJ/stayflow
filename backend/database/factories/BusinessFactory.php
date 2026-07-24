<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessFactory extends Factory
{
    public function definition(): array
    {
        return [

            'name' => fake()->company(),

            'slug' => fake()->unique()->slug(),

            'email' => fake()->companyEmail(),

            'phone' => fake()->phoneNumber(),

            'industry' => 'hotel',

            'country' => 'Nigeria',

            'state' => fake()->state(),

            'city' => fake()->city(),

            'address' => fake()->address(),

            'is_active' => true,
        ];
    }
}
