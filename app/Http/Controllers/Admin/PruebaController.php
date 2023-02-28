<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribuidor;
use App\Models\Planta;
use App\Models\PlantaProducto;
use App\Models\Producto;
use App\Models\Prueba;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PruebaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.prueba.index')->only('index');
        $this->middleware('can:admin.prueba.create')->only('create','store');
        $this->middleware('can:admin.prueba.edit')->only('edit','update');
        $this->middleware('can:admin.prueba.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prueba=Planta::all();
        $usuarios=User::all();
        $nombre = Auth::user()->id;
        $distribuidores = Distribuidor::all();
        return view('admin.prueba.index', compact('prueba','usuarios','nombre','distribuidores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto=Producto::all();
        $usuarios = User::pluck('name','id');
        $productos = Producto::pluck('nombre', 'id');
        $distribuidores = Distribuidor::pluck('nombre','id');
        return view('admin.prueba.create', compact('usuarios','productos','producto','distribuidores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prueba =new Planta();
        $prueba->codigo=$request->get('codigo');
        $prueba->distribuidor_id=$request->get('distribuidor_id');
        $prueba->nombre=$request->get('nombre');
        $prueba->user_id=$request->get('user_id');
        $prueba->fecha=$request->get('fecha');
        $prueba->entradacanasta=$request->get('entradacanasta');
        $prueba->salidacanasta=$request->get('salidacanasta');
        $prueba->save();
        if($request->producto_id){
            $producto= $request->get('producto_id');
            $salida= $request->get('salida');
            $fecha= $request->get('fvencimiento');
            $devolucion= $request->get('devoluciones');
            $cont =0;
            while($cont <count($producto)){
                $detalle =new PlantaProducto();
                $detalle->planta_id=$prueba->id;
                $detalle->producto_id=$producto[$cont];
                $detalle->salida=$salida[$cont];
                $detalle->fvencimiento=$fecha[$cont];
                $detalle->devoluciones=$devolucion[$cont];
                $detalle->save();
                $cont=$cont+1;

            }
            return redirect()->route('admin.prueba.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Planta $prueba)
    {
        $user=User::all();
        $detalle=PlantaProducto::all();
        $producto=Producto::all();
        return view('admin.prueba.show', compact('prueba','detalle','user','producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Planta $prueba)
    {
        $productos = Producto::pluck('nombre', 'id');
        $producto=Producto::all();
        $plantaproducto = PlantaProducto::all();
        $pruebas = Planta::pluck('codigo','id');
        $distribuidores = Distribuidor::pluck('nombre','id');
        return view('admin.prueba.edit', compact('prueba', 'distribuidores','productos','producto','plantaproducto','pruebas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planta $prueba)
    {
        $prueba->update ($request->all());
        return redirect()->route('admin.prueba.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planta $prueba)
    {
        $prueba->delete();
        return redirect()->route('admin.prueba.index')->with('eliminar', 'ok');
    }

    public function pdf($id)
    {
        $distribuidores=Distribuidor::all();
        $user=User::all();
        $detalle=PlantaProducto::all();
        $producto=Producto::all();
        $despacho=Planta::all();
        $pdf = Pdf::loadView('admin.prueba.pdf', compact('user','detalle','producto','id','despacho','distribuidores'));
        return $pdf->stream();
        //return dd($despacho);
    }
}
