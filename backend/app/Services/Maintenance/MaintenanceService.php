<?php

namespace App\Services\Maintenance;

use App\Models\Maintenance;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MaintenanceService
{
    public function __construct(
        protected MaintenanceReferenceService $referenceService,
    ) {
    }

    public function report(
        Unit $unit,
        string $title,
        ?string $description = null,
        string $priority = 'medium',
        array $metadata = [],
    ): Maintenance {

        return DB::transaction(function () use (
            $unit,
            $title,
            $description,
            $priority,
            $metadata
        ) {

            $maintenance = Maintenance::create([
                'business_id' => $unit->property->business_id,
                'unit_id' => $unit->id,
                'reference' => $this->referenceService->generate(),
                'title' => $title,
                'description' => $description,
                'priority' => $priority,
                'status' => 'open',
                'reported_at' => Carbon::now(),
                'metadata' => $metadata,
            ]);

            $unit->update([
                'housekeeping_status' => 'out_of_order',
            ]);

            return $maintenance;
        });
    } 
}