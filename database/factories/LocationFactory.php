<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Location::class;

    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->bothify('LOC###')), // Ej: LOC123
            'name' => $this->faker->city(), // Nombre de ciudad aleatoria
            'image' => "https://picsum.photos/seed/" . $this->faker->unique()->word . "/400/300",
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
