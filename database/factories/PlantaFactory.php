<?php

namespace Database\Factories;

use App\Models\Distribuidor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Planta>
 */
class PlantaFactory extends Factory
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
            'nombre'=>$this->faker->text(10),
            'salidacanasta' => $this->faker->text(10),
            'entradacanasta' => $this->faker->text(10),
            'distribuidor_id'=> Distribuidor::all()->random()->id,
            'user_id'=> User::all()->random()->id,    
        ];
    }
}
