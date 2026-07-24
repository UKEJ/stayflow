<?php

namespace App\Services\Booking;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Unit;
use App\Services\Availability\AvailabilityService;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BookingService
{
    public function __construct(
        protected AvailabilityService $availabilityService
    ) {
    }

    public function book(
        Guest $guest,
        Unit $unit,
        Carbon $checkIn,
        Carbon $checkOut,
        int $adults = 1,
        int $children = 0,
        ?string $notes = null,
    ): Reservation {

        if (! $this->availabilityService->isAvailable($unit, $checkIn, $checkOut)) {
            throw new \Exception('Unit is not available for the selected dates.');
        }

        return Reservation::create([
            'business_id' => $guest->business_id,
            'property_id' => $unit->property_id,
            'guest_id' => $guest->id,
            'unit_id' => $unit->id,

            'reference' => $this->generateReference(),

            'check_in' => $checkIn,
            'check_out' => $checkOut,

            'adults' => $adults,
            'children' => $children,

            'total_amount' => 0,

            'status' => 'confirmed',

            'notes' => $notes,
        ]);
    }

    protected function generateReference(): string
    {
        return 'RSV-' . strtoupper(Str::random(8));
    }
}