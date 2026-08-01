<?php

namespace App\Services\Payment;

use App\Models\Folio;
use App\Models\Payment;
use App\Services\Folio\FolioEntryService;
use Carbon\Carbon;

class PaymentService
{
    public function __construct(
        protected PaymentReferenceService $referenceService,
        protected FolioEntryService $entryService,
    ) {
    }

    public function record(
        Folio $folio,
        float $amount,
        string $method,
        ?string $notes = null,
        array $metadata = [],
    ): Payment {

        $payment = Payment::create([
            'business_id' => $folio->business_id,
            'folio_id' => $folio->id,
            'reference' => $this->referenceService->generate(),
            'amount' => $amount,
            'currency' => 'NGN',
            'method' => $method,
            'status' => 'successful',
            'paid_at' => Carbon::now(),
            'notes' => $notes,
            'metadata' => $metadata,
        ]);

        $this->entryService->addPayment(
            $folio,
            $amount,
            $payment->reference,
        );

        return $payment;
    }
}