<?php

namespace App\Services\Reservation;

use App\Models\Reservation;

class ReservationReferenceService
{
    public function generate(): string
    {
        do {
            $reference = 'RSV-' . strtoupper(fake()->bothify('######'));
        } while (
            Reservation::where('reference', $reference)->exists()
        );

        return $reference;
    }
}