<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lenguaje;

class LenguajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lenguaje::factory()->count(1)->create([
            'nombre' => 'Chatino '.rand(1, 100),
            'pronunciacion' => 'cha´tnio '.rand(1, 100),
            'significado' => 'Palabra dificil '.rand(1, 100),
            'content_id' => rand(1, 10),
        ]);
    }
}

