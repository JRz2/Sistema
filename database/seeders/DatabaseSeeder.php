<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\Admin\SupermarketController;
use App\Models\Categoria;
use App\Models\Despacho;
use App\Models\Supermarket;
use App\Models\DespachoPlanta;
use App\Models\Distribuidor;
use App\Models\Kardex;
use App\Models\Pedido;
use App\Models\Planta;
use App\Models\PlantaProducto;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        
        
        //Pedido::factory(4)->create();
        //Kardex::factory(2)->create();
       
       // DespachoPlanta::factory(2)->create();
        Categoria::factory(15)->create();
        Producto::factory(50)->create();
        Distribuidor::factory(20)->create();
        Despacho::factory(50)->create();
        Supermarket::factory(50)->create();
        Planta::factory(50)->create();
        PlantaProducto::factory(100)->create();
       // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
