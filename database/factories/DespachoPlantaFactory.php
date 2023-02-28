<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DespachoPlantaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'user_nombre'=> User::all()->random()->name,
            'fecha' => $this->faker->date(),
            'producto_codigo'=> Producto::all()->random()->codigo,
            'producto_nombre'=> Producto::all()->random()->nombre,
            'salida' => $this->faker->text(10),
            'fvencimiento' => $this->faker->date(),            
            'devolucion' => $this->faker->text(10),
            'entradacanasta' => $this->faker->text(10),
            'salidacanasta' => $this->faker->text(10),

            'user_id'=> User::all()->random()->id,
            'producto_id'=> Producto::all()->random()->id,

        ];
    }
}
