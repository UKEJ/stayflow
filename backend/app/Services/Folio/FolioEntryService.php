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
}