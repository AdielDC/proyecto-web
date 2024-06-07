<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Costume;

class CostumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Costume::factory()->count(2)->create([
            'nombre' => 'Enagua Santiago Yaitepec '.rand(1, 100),
            'descripcion' => 'El traje de la  mujer consta de un refajo que va debajo de la enagua, un ceñidor y un soyate de palma que ayudan a ceñir la cintura de las mujeres después del parto o para protegerse cuando realizan labores pesadas del campo. La enagua es de colores. Existe la enagua corta que lleva olanes y alforzas y la enagua larga con alforzas.',
            'imagen' => 'C:\Users\adiel\chatino\public\storage\trajetipico.jpg',
            'content_id' => rand(1, 10),
        ]);
    }
}
