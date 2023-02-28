<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kardex>
 */
class KardexFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->text(10),
            'producto_nombre'=> Producto::all()->random()->nombre,
            'producto_codigo'=> Producto::all()->random()->codigo,
            'mes' => $this->faker->text(10),
            'producto_categoria'=> Producto::all()->random()->categoria,
            'stockinicial' => $this->faker->text(10),
            'gavetas' => $this->faker->text(10),
            'fingreso' => $this->faker->date(),
            'cantingreso' => $this->faker->text(10),
            'gavetasm' => $this->faker->text(10),
            'fvencimiento' => $this->faker->date(),
            'cantdespacho' => $this->faker->text(10),
            'fdespacho' => $this->faker->date(),
            'totales' => $this->faker->text(10),
            'user_id'=> User::all()->random()->id,
            'user_nombre'=> User::all()->random()->name,
            'comentario' => $this->faker->text(50),
            'producto_id'=> Producto::all()->random()->id,
        ];
    }
}
