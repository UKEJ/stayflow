<?php

namespace Database\Seeders;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $units = Unit::orderBy('identifier')->get();
        $guests = Guest::all();

        $reservations = [
            [
                'unit' => 0,
                'guest' => 0,
                'check_in' => '2026-08-01',
                'check_out' => '2026-08-05',
                'status' => 'confirmed',
            ],
            [
                'unit' => 1,
                'guest' => 1,
                'check_in' => '2026-08-03',
                'check_out' => '2026-08-08',
                'status' => 'checked_in',
            ],
            [
                'unit' => 2,
                'guest' => 2,
                'check_in' => '2026-08-10',
                'check_out' => '2026-08-12',
                'status' => 'confirmed',
            ],
        ];

        foreach ($reservations as $reservation) {

            Reservation::create([
                'business_id' => $guests[$reservation['guest']]->business_id,
                'property_id' => $units[$reservation['unit']]->property_id,
                'guest_id' => $guests[$reservation['guest']]->id,
                'unit_id' => $units[$reservation['unit']]->id,

                'reference' => 'RSV-' . str_pad($reservation['unit'] + 1, 6, '0', STR_PAD_LEFT),

                'check_in' => $reservation['check_in'],
                'check_out' => $reservation['check_out'],

                'status' => $reservation['status'],
            ]);
        }
    }
}