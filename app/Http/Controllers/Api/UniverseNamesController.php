<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UniverseNamesResource;
use App\Http\Controllers\Controller;
use App\Services\UniverseService;
use App\Services\OrderService;

class UniverseNamesController extends Controller
{
    public UniverseService $universeService;
    public OrderService $orderService;

    public function __construct(OrderService $orderService, UniverseService $universeService)
    {
        $this->universeService = $universeService;
        $this->orderService = $orderService;
    }

    /**
     * @return UniverseNamesResource
     */
    public function index(): UniverseNamesResource
    {
        $orderTypeIds = $this->orderService->orderTypeIds();

        $universeNames = $this->universeService
            ->names($orderTypeIds)
            ->sortBy('name')
            ->all();

        return new UniverseNamesResource($universeNames);
    }
}
