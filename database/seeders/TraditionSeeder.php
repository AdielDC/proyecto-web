<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tradition;

class TraditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tradition::factory()->count(10)->create([
            'nombre' => 'Traje '.rand(1, 100),
            'descripcion' => 'Esta es una descripción de un traje',
            'imagen' => 'ruta/al/imagen.jpg',
            'content_id' => rand(1, 10),
        ]);
    }
}
