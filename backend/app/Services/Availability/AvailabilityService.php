<?php

namespace App\Services\Availability;

use App\Models\Reservation;
use App\Models\Unit;
use Carbon\Carbon;

class AvailabilityService
{
    public function isAvailable(
        Unit $unit,
        Carbon $checkIn,
        Carbon $checkOut
    ): bool {

    if ($unit->housekeeping_status === 'out_of_order') {
        return false;
    }

        $conflict = Reservation::query()

            ->where('unit_id', $unit->id)

            ->whereIn('status', [
                'confirmed',
                'checked_in',
            ])

            ->where(function ($query) use ($checkIn, $checkOut) {

                $query
                    ->whereBetween('check_in', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out', [$checkIn, $checkOut])
                    ->orWhere(function ($query) use ($checkIn, $checkOut) {

                        $query
                            ->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);

                    });

            })

            ->exists();

        return ! $conflict;
    }
}