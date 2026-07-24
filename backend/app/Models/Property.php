<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'business_id',
        'name',
        'slug',
        'type',
        'phone',
        'email',
        'country',
        'state',
        'city',
        'address',
        'star_rating',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function unitTypes(): HasMany
    {
        return $this->hasMany(UnitType::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }   
}
