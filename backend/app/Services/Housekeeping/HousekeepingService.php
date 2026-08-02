<?php

namespace App\Services\Housekeeping;

use App\Models\Unit;
use Exception;

class HousekeepingService
{
    public function markClean(Unit $unit): Unit
    {
        if ($unit->is_occupied) {
            throw new Exception(
                'Cannot clean an occupied unit.'
            );
        }

        $unit->update([
            'housekeeping_status' => 'clean',
        ]);

        return $unit->fresh();
    }

    public function markDirty(Unit $unit): Unit
    {
        $unit->update([
            'housekeeping_status' => 'dirty',
        ]);

        return $unit->fresh();
    }
}