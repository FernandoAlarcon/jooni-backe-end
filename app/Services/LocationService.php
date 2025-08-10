<?php

namespace App\Services;

use App\Models\Location;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LocationService
{
    /**
     * Obtiene lista paginada de ubicaciones con filtros opcionales.
     *
     * @param array{name?: string, code?: string} $filters
     */
    public function getAll(array $filters = [], int $perPage = 6): LengthAwarePaginator
    {
        $query = Location::query();

        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . (string) $filters['name'] . '%');
        }

        if (!empty($filters['code'])) {
            $query->where('code', 'like', '%' . (string) $filters['code'] . '%');
        }

        return $query->paginate($perPage);
    }

    /**
     * Crea una nueva ubicación.
     *
     * @param array<string, mixed> $data
     */
    public function create(array $data): Location
    {
        /** @var Location $location */
        $location = Location::create($data);

        return $location;
    }
}
