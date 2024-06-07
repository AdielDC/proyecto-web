<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::factory()->count(10)->create([
            'titulo' => 'Título '.rand(1, 100),
            'descripcion' => 'Esta es una descripción de un contenido',
            'imagen' => 'ruta/al/imagen.jpg',
            'video' => 'ruta/al/video.mp4',
            'audio' => 'ruta/al/audio.mp3',
            'fecha_publicacion' => now()->subDays(rand(1, 365)),
            'fecha_modificacion' => now(),
            'user_id' => rand(1, 10),
        ]);
    }
}
