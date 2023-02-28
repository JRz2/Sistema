<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Despacho;
use App\Models\DespachoProducto;
use App\Models\Distribuidor;
use App\Models\Kardex;
use App\Models\KardexDespacho;
use App\Models\Planta;
use App\Models\PlantaProducto;
use App\Models\Producto;
use App\Models\Supermarket;
use App\Models\SupermarketProducto;
use Illuminate\Http\Request;

class KardexController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.kardex.index')->only('index');
        $this->middleware('can:admin.kardex.create')->only('create','store');
        $this->middleware('can:admin.kardex.edit')->only('edit','update');
        $this->middleware('can:admin.kardex.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kardex=Kardex::all();
        $productos=Producto::all();
        $categorias=Categoria::all();
        return view('admin.kardex.index', compact('kardex','productos','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kardex $kardex)
    {
        $productos=Producto::all();
        $categorias=Categoria::all();
        $detalle=KardexDespacho::all();
        $despa=DespachoProducto::all();
        $despachos=Despacho::all();
        $superm=SupermarketProducto::all();
        $supers=Supermarket::all();
        $distribuidores=Distribuidor::all();
        $planta=PlantaProducto::all();
        $plantas=Planta::all();
        return view('admin.kardex.show', compact('kardex','productos','categorias','detalle','despa','despachos','distribuidores','superm','supers','planta','plantas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
