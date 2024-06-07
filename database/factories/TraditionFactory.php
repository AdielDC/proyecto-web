<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tradition;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tradition>
 */
class TraditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'imagen' => $this->faker->imageUrl(),
            'content_id' => rand(1, 10),
        ];
    }
}
