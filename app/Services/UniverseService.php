<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class UniverseService
{
    public function names($orders): Collection
    {
        return Http::post('https://esi.evetech.net/latest/universe/names/?datasource=tranquility',
            $orders
        )->collect();
    }
}
