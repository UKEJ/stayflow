<?php

namespace App\Services\Folio;

use App\Models\Folio;

class BalanceService
{
    /**
     * Current outstanding balance.
     */
    public function balance(Folio $folio): float
    {
        return (float) $folio->entries()->sum('amount');
    }

    /**
     * Total charges posted.
     */
    public function charges(Folio $folio): float
    {
        return (float) $folio->entries()
            ->where('type', 'charge')
            ->sum('amount');
    }

    /**
     * Total payments received.
     */
    public function payments(Folio $folio): float
    {
        return abs(
            (float) $folio->entries()
                ->where('type', 'payment')
                ->sum('amount')
        );
    }

    /**
     * Whether the folio is fully settled.
     */
    public function isSettled(Folio $folio): bool
    {
        return $this->balance($folio) <= 0;
    }
}