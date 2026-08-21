<?php

namespace App\Services\NightAudit;

use App\Models\Business;
use App\Models\BusinessDay;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BusinessDayService
{            
    public function current(Business $business): BusinessDay
    {
        $current = BusinessDay::where('business_id', $business->id)
            ->where('is_closed', false)
            ->latest('business_date')
            ->first();

        if ($current) {
            return $current;
        }

        return BusinessDay::create([
            'business_id' => $business->id,
            'business_date' => Carbon::today()->toDateString(),
            'is_closed' => false,
        ]);
    }

    public function advance(Business $business): BusinessDay
    {
        return DB::transaction(function () use ($business) {

            $current = $this->current($business);

            if ($current->is_closed) {
                throw new \Exception(
                    'Business day has already been closed.'
                );
            }

            $current->update([
                'is_closed' => true,
                'closed_at' => now(),
            ]);

            return BusinessDay::create([
                'business_id' => $business->id,
                'business_date' => $current->business_date
                    ->copy()
                    ->addDay(),
                'is_closed' => false,
            ]);
        });
    }
}