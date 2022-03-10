<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class OrderService
{
    public function getAll(): Collection
    {
        return Http::get('https://esi.evetech.net/latest/markets/10000002/orders/?datasource=tranquility&order_type=all&page=1')->collect();
    }

    public function orderTypeIds(): array
    {
        return array_unique($this->getAll()->pluck('type_id')->toArray());
    }
}
