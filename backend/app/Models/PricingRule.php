<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricingRule extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'rate_plan_id',
        'season_id',
        'name',
        'adjustment_type',
        'adjustment_value',
        'priority',
        'is_active',
    ];

    protected $casts = [
        'adjustment_value' => 'decimal:2',
        'priority' => 'integer',
        'is_active' => 'boolean',
    ];

    public function ratePlan(): BelongsTo
    {
        return $this->belongsTo(RatePlan::class);
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}