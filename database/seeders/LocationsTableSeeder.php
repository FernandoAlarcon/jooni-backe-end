<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('locations')->insert([
            ['code' => 'LOC001', 'name' => 'Bogotá', 'image' => 'bogota.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC002', 'name' => 'Medellín', 'image' => 'medellin.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC003', 'name' => 'Cali', 'image' => 'cali.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC004', 'name' => 'Barranquilla', 'image' => 'barranquilla.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC005', 'name' => 'Cartagena', 'image' => 'cartagena.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC006', 'name' => 'Bucaramanga', 'image' => 'bucaramanga.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC007', 'name' => 'Santa Marta', 'image' => 'santamarta.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC008', 'name' => 'Cúcuta', 'image' => 'cucuta.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC009', 'name' => 'Pereira', 'image' => 'pereira.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'LOC010', 'name' => 'Manizales', 'image' => 'manizales.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
