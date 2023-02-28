<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Planta;
use App\Models\PlantaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PlantaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto=Producto::all();
        $productos = Producto::pluck('nombre','id');
        $plantaproducto=PlantaProducto::all();
        $plantas = Planta::pluck('codigo','id');
        return view('admin.plantaproducto.index', compact('plantaproducto','producto','productos','plantas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::pluck('nombre','id');
        return view('admin.plantaproducto.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plantaproducto=PlantaProducto::create($request->all());
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantaProducto $plantaproducto)
    {
        return view('admin.plantaproducto.edit', compact('plantaproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlantaProducto $plantaproducto)
    {
        $plantaproducto->update ($request->all());
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantaProducto $plantaproducto)
    {
        $plantaproducto->delete();
        return Redirect::back()->with('message','Operation Successful !');
    }
}
