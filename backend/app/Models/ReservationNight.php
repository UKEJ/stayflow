<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationNight extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'reservation_id',
        'stay_date',
        'base_rate',
        'final_rate',
        'posted',
        'posted_at',
    ];

    protected $casts = [
        'stay_date' => 'date',
        'base_rate' => 'decimal:2',
        'final_rate' => 'decimal:2',
        'posted' => 'boolean',
        'posted_at' => 'datetime',
    ];

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}