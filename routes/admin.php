<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\DespachoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\SupermarketController;
use App\Http\Controllers\Admin\DespachoProductoController;
use App\Http\Controllers\Admin\DistribuidorController;
use App\Http\Controllers\Admin\InventarioController;
use App\Http\Controllers\Admin\InventarioProductoController;
use App\Http\Controllers\Admin\KardexController;
use App\Http\Controllers\Admin\KardexDespachoController;
use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\Admin\PlantController;
use App\Http\Controllers\Admin\PlantaProductoController;
use App\Http\Controllers\Admin\PruebaController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\SupermarketProductoController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Despacho;
use App\Models\InventarioProducto;
use App\Models\KardexDespacho;

Route::get('', [HomeController::class, 'index']);
Route::resource('users', UserController::class)->names('admin.user');  
Route::resource('productos', ProductoController::class)->names('admin.producto');
//Route::resource('users/pdf', [UserController::class,'pdf'])->names('admin.users.pdf'); 

Route::get('/use/pdf', [UserController::class, 'pdf']);
Route::get('/producto/pdf', [ProductoController::class, 'pdf']);
Route::get('/distribuidor/pdf', [DistribuidorController::class, 'pdf']);
Route::get('/despacho/pdf/{id}', [DespachoController::class, 'pdf']);
Route::get('/prueba/pdf/{id}', [PruebaController::class, 'pdf']);
Route::get('/supermarket/pdf/{id}', [SupermarketController::class, 'pdf']);

Route::resource('roles', RolController::class)->names('admin.rol'); 
Route::resource('permisos', PermisoController::class)->names('admin.permiso');    
Route::resource('categorias', CategoriaController::class)->names('admin.categoria');

Route::resource('distribuidors', DistribuidorController::class)->names('admin.distribuidor');
Route::resource('despacho', DespachoController::class)->names('admin.despacho');
Route::resource('supermarket', SupermarketController::class)->names('admin.supermarket');
Route::resource('pedido', PedidoController::class)->names('admin.pedido');
Route::resource('despachoproducto', DespachoProductoController::class)->names('admin.despachoproducto');
Route::resource('supermarketproducto', SupermarketProductoController::class)->names('admin.supermarketproducto');
Route::resource('plantaproducto', PlantaProductoController::class)->names('admin.plantaproducto');
Route::resource('prueba', PruebaController::class)->names('admin.prueba');
Route::resource('inventario', InventarioController::class)->names('admin.inventario');
Route::resource('inventarioproducto', InventarioProductoController::class)->names('admin.inventarioproducto');
Route::resource('kardex', KardexController::class)->names('admin.kardex');
Route::resource('kardexdespacho', KardexDespachoController::class)->names('admin.kardexdespacho');
//Route::resource('prueba', SupermarketController::class);