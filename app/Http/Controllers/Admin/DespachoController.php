<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Despacho;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\DespachoProducto;
use App\Models\Distribuidor;
use Barryvdh\DomPDF\Facade\Pdf;

class DespachoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.despacho.index')->only('index');
        $this->middleware('can:admin.despacho.create')->only('create','store');
        $this->middleware('can:admin.despacho.edit')->only('edit','update');
        $this->middleware('can:admin.despacho.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despacho=Despacho::all();
       // return dd($despacho);
        //$usuarios = User::pluck('name','id');
        $usuarios=User::all();
        $nombre = Auth::user()->id;
        $distribuidores = Distribuidor::all();
        return view('admin.despacho.index', compact('despacho','usuarios','nombre','distribuidores'));
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
       // $user_id = User::pluck('name','id');
        //if($this->$user_id == auth()->user()->id){
            //$usuarios = User::pluck('name','id');
            //$user_id = $usuarios
        //}
        $productos = Producto::pluck('nombre', 'id');
        $distribuidores = Distribuidor::pluck('nombre','id');
        return view('admin.despacho.create', compact('usuarios','productos','producto','distribuidores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $despacho =new Despacho();
        $despacho->codigo=$request->get('codigo');
        $despacho->distribuidor_id=$request->get('distribuidor_id');
        $despacho->user_id=$request->get('user_id');
        $despacho->fecha=$request->get('fecha');
        $despacho->entradacanasta=$request->get('entradacanasta');
        $despacho->salidacanasta=$request->get('salidacanasta');
        $despacho->save();
        if($request->producto_id){
            $producto= $request->get('producto_id');
            $salida= $request->get('salida');
            $fecha= $request->get('fvencimiento');
            $devolucion= $request->get('devoluciones');
            $cont =0;
            while($cont <count($producto)){
                $detalle =new DespachoProducto();
                $detalle->despacho_id=$despacho->id;
                $detalle->producto_id=$producto[$cont];
                $detalle->salida=$salida[$cont];
                $detalle->fvencimiento=$fecha[$cont];
                $detalle->devoluciones=$devolucion[$cont];
                $detalle->save();
                $cont=$cont+1;

            }
            return redirect()->route('admin.despacho.index')->with('guardar','ok');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Despacho $despacho)
    {
        $user=User::all();
        $detalle=DespachoProducto::all();
        $producto=Producto::all();
        $distribuidores=Distribuidor::all();
        return view('admin.despacho.show', compact('despacho','detalle','user','producto','distribuidores'));

        //return dd($despacho);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Despacho $despacho)
    {
        $productos = Producto::pluck('nombre', 'id');
        $producto=Producto::all();
        $despachoproducto = DespachoProducto::all();
        $despachos = Despacho::pluck('codigo','id');
        $distribuidores = Distribuidor::pluck('nombre','id');
        //return dd($productos);
        //return dd($despachoproducto);
        return view('admin.despacho.edit', compact('despacho','productos','despachoproducto','producto','despachos','distribuidores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despacho $despacho)
    {
        $despacho->update($request->all());
       // $despachoproducto->update ($request->all());
        return redirect()->route('admin.despacho.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despacho $despacho)
    {
        $despacho->delete();
        return redirect()->route('admin.despacho.index')->with('eliminar', 'ok');
    }
    
    public function pdf($id)
    {
        $distribuidores=Distribuidor::all();
        $user=User::all();
        $detalle=DespachoProducto::all();
        $producto=Producto::all();
        $despacho=Despacho::all();
        $pdf = Pdf::loadView('admin.despacho.pdf', compact('user','detalle','producto','id','despacho','distribuidores'));
        return $pdf->stream();
        //return dd($despacho);
    }
}
