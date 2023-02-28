<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
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
                'codigo' => $this->faker->text(10),
                'nombre'=> $name,
                'categoria_id'=> Categoria::all()->random()->id, 
            ];
            
    }
}
