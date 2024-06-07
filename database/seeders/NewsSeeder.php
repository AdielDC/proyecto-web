<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::truncate();

        $news = [
            [
                'titulo' => 'Se acercan fechas festivas en Santiago Yaitepec',
                'descripcion' => 'Estamos a menos de dos meses para que se de lugar a la fiesta patronal de la comunidad',
                'imagen' => 'ruta/al/imagen1.jpg',
                'fecha_publicacion' => '2022-01-01',
                'user_id' => 1,
            ],
            [
                'titulo' => 'Noticia 2',
                'descripcion' => 'Descripción de la noticia 2',
                'imagen' => 'ruta/al/imagen2.jpg',
                'fecha_publicacion' => '2022-01-02',
                'user_id' => 1,
            ],
            // Agrega más noticias aquí
        ];

        foreach ($news as $noticia) {
            News::create($noticia);
        }
    }
}
