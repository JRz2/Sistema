<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DespachoSuper>
 */
class SupermarketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigo'=> $this->faker->text(5),
            'fecha' => $this->faker->date(),
            'supermercado' => $this->faker->text(10),
            'sala' => $this->faker->text(10),
            'salidacanasta' => $this->faker->text(10),
            'entradacanasta' => $this->faker->text(10),
            'user_id'=> User::all()->random()->id,    
            'distribuidor_id'=> User::all()->random()->id,        

        ];
    }
}
