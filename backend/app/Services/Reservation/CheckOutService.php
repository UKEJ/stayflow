<?php

namespace App\Services\Reservation;

use App\Models\Reservation;
use App\Services\Folio\BalanceService;
use Exception;
use Illuminate\Support\Facades\DB;

class CheckOutService
{
    public function __construct(
        protected BalanceService $balanceService,
    ) {
    }

    public function checkOut(Reservation $reservation): Reservation
    {
        if ($reservation->status !== 'checked_in') {
            throw new Exception(
                'Only checked-in reservations can be checked out.'
            );
        }

        $folio = $reservation->folio;

        if ($this->balanceService->balance($folio) > 0) {
            throw new Exception(
                'Outstanding balance must be settled before checkout.'
            );
        }

        DB::transaction(function () use ($reservation, $folio) {

            $reservation->update([
                'status' => 'checked_out',
            ]);

            $reservation->unit->update([
                'is_occupied' => false,
            ]);

            $folio->update([
                'status' => 'closed',
            ]);

        });

        return $reservation->fresh();
    }
}