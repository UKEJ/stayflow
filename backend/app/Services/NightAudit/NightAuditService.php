<?php

namespace App\Services\NightAudit;

use App\Models\Business;
use Illuminate\Support\Facades\DB;

class NightAuditService
{
    public function __construct(
        protected BusinessDayService $businessDayService,
    ) {
    }

    public function run(Business $business): void
    {
        DB::transaction(function () use ($business) {

            /*
             * Future steps will be added here:
             *
             * - Verify no pending check-ins
             * - Verify no pending check-outs
             * - Post room charges
             * - Update balances
             * - Generate reports
             */

            $this->businessDayService->advance($business);
        });
    }
}