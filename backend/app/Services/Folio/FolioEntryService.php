<?php

namespace App\Services\Folio;

use App\Models\Folio;
use App\Models\FolioEntry;
use Carbon\Carbon;

class FolioEntryService
{
    public function addCharge(
        Folio $folio,
        string $category,
        string $description,
        float $amount,
        ?string $reference = null,
        array $metadata = []
    ): FolioEntry {

        return FolioEntry::create([
            'folio_id' => $folio->id,
            'posted_at' => Carbon::now(),

            'type' => 'charge',

            'category' => $category,
            'description' => $description,

            'amount' => $amount,

            'reference' => $reference,

            'metadata' => $metadata,
        ]);
    }

    public function addPayment(
        Folio $folio,
        float $amount,
        ?string $reference = null,
        array $metadata = []
    ): FolioEntry {

        return FolioEntry::create([
            'folio_id' => $folio->id,
            'posted_at' => Carbon::now(),

            'type' => 'payment',

            'category' => 'payment',
            'description' => 'Guest Payment',

            /**
             * Payments are stored as negative values so that:
             *
             * Charges  +100,000
             * Payments -40,000
             * -----------------
             * Balance   60,000
             */
            'amount' => -$amount,

            'reference' => $reference,

            'metadata' => $metadata,
        ]);
    }
}