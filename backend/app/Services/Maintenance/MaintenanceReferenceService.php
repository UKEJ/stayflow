<?php

namespace App\Services\Maintenance;

class MaintenanceReferenceService
{
    public function generate(): string
    {
        do {
            $reference = 'MNT-' . random_int(100000, 999999);
        } while (\App\Models\Maintenance::where('reference', $reference)->exists());

        return $reference;
    }
}   
