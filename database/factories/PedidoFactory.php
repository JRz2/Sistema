<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
            return[
                'cantidad' => $this->faker->text(10),
                'producto_id'=> Producto::all()->random()->id,
                'user_id'=> User::all()->random()->id,
                'user_nombre'=> User::all()->random()->name,
                'producto_nombre'=> Producto::all()->random()->nombre,
            ];
    }
}
