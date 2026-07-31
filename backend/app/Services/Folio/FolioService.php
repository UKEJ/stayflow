<?php

namespace App\Services\Folio;

use App\Models\Folio;
use App\Models\Reservation;

class FolioService
{
    public function __construct(
        protected FolioNumberService $numberService,
        protected FolioEntryService $entryService,
    ) {
    }

    public function createForReservation(
        Reservation $reservation
    ): Folio {

        $folio = Folio::create([
            'business_id' => $reservation->business_id,
            'reservation_id' => $reservation->id,
            'number' => $this->numberService->generate(),
            'status' => 'open',
        ]);

        $this->entryService->addCharge(
            $folio,
            'room',
            'Room Charge',
            (float) $reservation->total_amount,
            $reservation->reference,
        );

        return $folio;
    }
}