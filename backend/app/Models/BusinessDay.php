<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessDay extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'business_id',
        'business_date',
        'is_closed',
        'closed_at',
    ];

    protected $casts = [
        'business_date' => 'date',
        'is_closed' => 'boolean',
        'closed_at' => 'datetime',
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}