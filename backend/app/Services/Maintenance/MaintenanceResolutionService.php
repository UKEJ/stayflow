<?php

namespace App\Services\Maintenance;

use App\Models\Maintenance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MaintenanceResolutionService

{
    public function resolve(Maintenance $maintenance): Maintenance
    {
        return DB::transaction(function () use ($maintenance) {

            $maintenance->update([
                'status' => 'resolved',
                'resolved_at' => Carbon::now(),
            ]);

            $maintenance->unit->update([
                'housekeeping_status' => 'dirty',
            ]);

            return $maintenance->fresh();
        });
    }
}