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
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Guarda la imagen en storage/app/public/locations
            $path = $request->file('image')->store('locations', 'public');
            // Guarda la ruta relativa en el array $data, por ejemplo para acceder luego via url
            $data['image'] = $path; 
        }

        $location = $this->locationService->create($data);

        return new LocationResource($location);
    }

}
