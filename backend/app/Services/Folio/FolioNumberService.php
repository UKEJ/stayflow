<?php

namespace App\Services\Folio;

use App\Models\Folio;

class FolioNumberService
{
    public function generate(): string
    {
        do {
            $number = 'FOL-' . strtoupper(fake()->bothify('######'));
        } while (Folio::where('number', $number)->exists());

        return $number;
    }
}