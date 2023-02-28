<?php

namespace Database\Factories;

use App\Models\Planta;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlantaProducto>
 */
class PlantaProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'salida'=> $this->faker->numberBetween(50,100),
            'fvencimiento' => $this->faker->date(),
            'devoluciones' => $this->faker->numberBetween(50,100),
            'planta_id'=> Planta::all()->random()->id,
            'producto_id'=> Producto::all()->random()->id,   
        ];
    }
}
