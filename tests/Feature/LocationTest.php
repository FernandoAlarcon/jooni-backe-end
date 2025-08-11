<?php
 
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    private function getAuthHeaders()
    {
        return [
            'X-API-KEY' => env('API_KEY_SECRET'),  
        ];
    }

    public function test_location_index_returns_locations()
    {
        Location::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/locations', $this->getAuthHeaders());

        $response->assertStatus(200);
        $response->assertJsonStructure(['data', 'meta']);
        $this->assertCount(3, $response->json('data'));
    }

    public function test_location_store_requires_authentication()
    {
        $response = $this->postJson('/api/v1/locations', [
            'name' => 'Test',
            'code' => 'TST001',
        ]);

        $response->assertStatus(401);
    }

    public function test_location_store_authenticated()
    {
        $payload = [
            'name' => 'Test Location',
            'code' => 'TL001',
        ];

        $response = $this->postJson('/api/v1/locations', $payload, $this->getAuthHeaders());

        $response->assertStatus(201);
        $this->assertDatabaseHas('locations', $payload);
    }
}
