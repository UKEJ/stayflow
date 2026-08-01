<?php

namespace App\Services\Payment;

use App\Models\Payment;

class PaymentReferenceService
{
    public function generate(): string
    {
        do {

            $reference = 'PAY-' . random_int(
                100000,
                999999
            );

        } while (
            Payment::where('reference', $reference)->exists()
        );

        return $reference;
    }
}