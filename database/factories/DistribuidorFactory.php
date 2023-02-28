<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distribuidor>
 */
class DistribuidorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        return[    
            'nombre'=> $name,        
            'paterno' => $this->faker->text(10),
            'materno' => $this->faker->text(10),
            'celular' => $this->faker->text(10),
        ];
    }
}
