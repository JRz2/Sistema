<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventario;
use App\Models\InventarioProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventario=Inventario::all();
        return view('admin.inventario.index', compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventario =new Inventario();
        $inventario->codigo=$request->get('codigo');
        $inventario->fecha=$request->get('fecha');
        $inventario->save();

        return redirect()->route('admin.inventario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        $productos = Producto::pluck('nombre', 'id');
        $producto=Producto::all();
        $inventarioproducto= InventarioProducto::all();
        return view('admin.inventario.show', compact('inventario','inventarioproducto','producto','productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        $productos = Producto::pluck('nombre', 'id');
        $producto=Producto::all();
        $inventarioproducto = InventarioProducto::all();
        return view('admin.inventario.edit', compact('inventario','inventarioproducto','producto','productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $inventario->update($request->all());
        return redirect()->route('admin.inventario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('admin.inventario.index');
    }
}
