<?php

namespace App\Services\Booking;

use App\Models\Guest;
use App\Models\RatePlan;
use App\Models\Reservation;
use App\Models\Unit;
use App\Services\Availability\AvailabilityService;
use App\Services\Pricing\PricingService;
use App\Services\Reservation\ReservationReferenceService;
use Carbon\Carbon;

class BookingService
{
    public function __construct(
        protected AvailabilityService $availabilityService,
        protected ReservationReferenceService $referenceService,
        protected PricingService $pricingService,
    ) {
    }

    public function book(
        Guest $guest,
        Unit $unit,
        RatePlan $ratePlan,
        Carbon $checkIn,
        Carbon $checkOut,
        int $adults = 1,
        int $children = 0,
        ?string $notes = null,
    ): Reservation {

        if (! $this->availabilityService->isAvailable($unit, $checkIn, $checkOut)) {
            throw new \Exception('Unit is not available for the selected dates.');
        }

        $total = $this->pricingService->calculate(
            $unit,
            $ratePlan,
            $checkIn,
            $checkOut
        );

        return Reservation::create([
            'business_id' => $guest->business_id,
            'property_id' => $unit->property_id,
            'guest_id' => $guest->id,
            'unit_id' => $unit->id,
            'rate_plan_id' => $ratePlan->id,

            'reference' => $this->referenceService->generate(),

            'check_in' => $checkIn,
            'check_out' => $checkOut,

            'adults' => $adults,
            'children' => $children,

            'total_amount' => $total,

            'status' => 'confirmed',

            'notes' => $notes,
        ]);
    }
}