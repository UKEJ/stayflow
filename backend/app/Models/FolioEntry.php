<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FolioEntry extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'folio_id',
        'posted_at',
        'type',
        'category',
        'description',
        'amount',
        'reference',
        'metadata',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'amount' => 'decimal:2',
        'metadata' => 'array',
    ];

    public function folio(): BelongsTo
    {
        return $this->belongsTo(Folio::class);
    }
}