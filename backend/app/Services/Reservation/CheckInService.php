<?php

namespace App\Services\Reservation;

use App\Models\Reservation;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class CheckInService
{
    public function checkIn(
        Reservation $reservation,
        ?Carbon $checkedInAt = null
    ): Reservation {

        $checkedInAt ??= now();

        if ($reservation->status !== 'confirmed') {
            throw new Exception(
                'Only confirmed reservations can be checked in.'
            );
        }

        if ($reservation->unit->is_occupied) {
            throw new Exception(
                'Unit is already occupied.'
            );
        }

        DB::transaction(function () use (
            $reservation,
            $checkedInAt
        ) {

            $reservation->update([
                'status' => 'checked_in',
            ]);

            $reservation->unit->update([
                'is_occupied' => true,
            ]);

        });

        return $reservation->fresh();
    }
}