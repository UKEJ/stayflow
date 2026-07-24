<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $business = Business::first();

        Property::create([
            'business_id' => $business->id,
            'name' => 'Royal Palace Enugu',
            'slug' => 'royal-palace-enugu',
            'email' => 'enugu@royalpalace.com',
            'phone' => '+2348011111111',
            'country' => 'Nigeria',
            'state' => 'Enugu',
            'city' => 'Enugu',
            'address' => '1 Independence Layout, Enugu',
            'is_active' => true,
        ]);

        Property::create([
            'business_id' => $business->id,
            'name' => 'Royal Palace Lagos',
            'slug' => 'royal-palace-lagos',
            'email' => 'lagos@royalpalace.com',
            'phone' => '+2348022222222',
            'country' => 'Nigeria',
            'state' => 'Lagos',
            'city' => 'Lagos',
            'address' => '10 Victoria Island, Lagos',
            'is_active' => true,
        ]);

        Property::create([
            'business_id' => $business->id,
            'name' => 'Royal Palace Abuja',
            'slug' => 'royal-palace-abuja',
            'email' => 'abuja@royalpalace.com',
            'phone' => '+2348033333333',
            'country' => 'Nigeria',
            'state' => 'FCT',
            'city' => 'Abuja',
            'address' => '25 Central Business District, Abuja',
            'is_active' => true,
        ]);
    }
}