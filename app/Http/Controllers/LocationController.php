<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Resources\LocationResource;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'code']);
        $locations = $this->locationService->getAll($filters);

        return LocationResource::collection($locations);
    }

    public function store(StoreLocationRequest $request)
    {
        $location = $this->locationService->create($request->validated());

        return new LocationResource($location);
    }
}
