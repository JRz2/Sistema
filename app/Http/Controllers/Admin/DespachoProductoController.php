<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Despacho;
use App\Models\DespachoProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DespachoProductoController extends Controller
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
        $despachoproducto=DespachoProducto::all();
        $despachos = Despacho::pluck('codigo','id');
        return view('admin.despachoproducto.index', compact('despachoproducto','producto','productos','despachos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::pluck('nombre','id');
        return view('admin.despachoproducto.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $despachoproducto=DespachoProducto::create($request->all());
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
    public function edit(DespachoProducto $despachoproducto)
    {
       return view('admin.despachoproducto.edit', compact('despachoproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DespachoProducto $despachoproducto)
    {
        $despachoproducto->update ($request->all());
        return Redirect::back()->with('message','Operation Successful !');
        //return redirect()->route('admin.despachoproducto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DespachoProducto $despachoproducto)
    {
        $despachoproducto->delete();
        return Redirect::back()->with('message','Operation Successful !');
    }
}
