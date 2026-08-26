<?php

namespace App\Services\Booking;

use App\DataTransferObjects\PricingContext;
use App\Models\Guest;
use App\Models\RatePlan;
use App\Models\Reservation;
use App\Models\Unit;
use App\Services\Availability\AvailabilityService;
use App\Services\Folio\FolioService;
use App\Services\Pricing\PricingService;
use App\Services\Reservation\ReservationReferenceService;
use Carbon\Carbon;

class BookingService    
{
    public function __construct(
        protected AvailabilityService $availabilityService,
        protected ReservationReferenceService $referenceService,
        protected PricingService $pricingService,
        protected FolioService $folioService,
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

        $pricing = $this->pricingService->calculate(
            new PricingContext(
                unit: $unit,
                guest: $guest,
                ratePlan: $ratePlan,
                checkIn: $checkIn,
                checkOut: $checkOut,
                adults: $adults,
                children: $children,
            )
        );

        $reservation = Reservation::create([
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

            'total_amount' => $pricing->total,

            'status' => 'confirmed',

            'notes' => $notes,
        ]);

        $this->folioService->createForReservation($reservation);

        return $reservation;
    }
}