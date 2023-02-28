<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Supermarket;
use App\Models\SupermarketProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SupermarketProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supermarkets = Supermarket::pluck('codigo','id');
        $productos = Producto::pluck('nombre','id');
        $supermarketproducto=SupermarketProducto::all();
        $producto=Producto::all();
        return view('admin.supermarketproducto.index',compact('supermarkets','productos','supermarketproducto','producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::pluck('nombre','id');
        return view('admin.seupermarketproducto.create',compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supermarketproducto=SupermarketProducto::create($request->all());
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
    public function edit(SupermarketProducto $supermarketproducto)
    {
        return view('admin.supermarketproducto.edit', compact('supermarketproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupermarketProducto $supermarketproducto)
    {
        $supermarketproducto->update ($request->all());
        return Redirect::back()->with('message','Operation Successful !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupermarketProducto $supermarketproducto)
    {
        $supermarketproducto->delete();
        return Redirect::back()->with('message','Operation Successful !');
    }
}
