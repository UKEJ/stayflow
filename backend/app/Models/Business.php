<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'industry',
        'country',
        'state',
        'city',
        'address',
        'logo',
        'is_active',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }
}