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
        'rule_type',
        'adjustment_type',
        'operator',
        'adjustment_value',
        'conditions',
        'starts_on',
        'ends_on',
        'priority',
        'is_active',
    ];

    protected $casts = [
        'conditions' => 'array',
        'starts_on' => 'date',
        'ends_on' => 'date',
        'adjustment_value' => 'decimal:2',
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