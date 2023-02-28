<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribuidor;
use App\Models\Producto;
use App\Models\Supermarket;
use App\Models\SupermarketProducto;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupermarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.supermarket.index')->only('index');
        $this->middleware('can:admin.supermarket.create')->only('create','store');
        $this->middleware('can:admin.supermarket.edit')->only('edit','update');
        $this->middleware('can:admin.supermarket.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supermarket=Supermarket::all();
        $usuarios=User::all();
        $nombre = Auth::user()->id;
        $distribuidores = Distribuidor::all();

        return view('admin.supermarket.index', compact('supermarket','usuarios','nombre','distribuidores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distribuidores = Distribuidor::pluck('nombre','id');
        $productos = Producto::pluck('nombre', 'id');
        return view('admin.supermarket.create',compact('productos','distribuidores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supermarket =new Supermarket();
        $supermarket->codigo=$request->get('codigo');
        $supermarket->user_id=$request->get('user_id');
        $supermarket->distribuidor_id=$request->get('distribuidor_id');
        $supermarket->fecha=$request->get('fecha');
        $supermarket->supermercado=$request->get('supermercado');
        $supermarket->sala=$request->get('sala');
        $supermarket->entradacanasta=$request->get('entradacanasta');
        $supermarket->salidacanasta=$request->get('salidacanasta');
        $supermarket->save();
        //$request=request()->all();
        //return dd($request);
        //$despacho=Despacho::create($request->all());
        if($request->producto_id){
            //$despacho->productos()->attach($request->producto_id);
            $producto= $request->get('producto_id');
            $salida= $request->get('salida');
            $fecha= $request->get('fvencimiento');
            $devolucion= $request->get('devoluciones');
            $cont =0;
            while($cont <count($producto)){
                $detalle =new SupermarketProducto();
                $detalle->supermarket_id=$supermarket->id;
                $detalle->producto_id=$producto[$cont];
                $detalle->salida=$salida[$cont];
                $detalle->fvencimiento=$fecha[$cont];
                $detalle->devoluciones=$devolucion[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            return redirect()->route('admin.supermarket.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supermarket $supermarket)
    {
        $user=User::all();
        $detalle=SupermarketProducto::all();
        $producto=Producto::all();
        return view('admin.supermarket.show', compact('supermarket','detalle','user','producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supermarket $supermarket)
    {
        $productos = Producto::pluck('nombre', 'id');
        $producto=Producto::all();
        $supermarketproducto = SupermarketProducto::all();
        $supermarkets = Supermarket::pluck('codigo','id');
        $distribuidores = Distribuidor::pluck('nombre','id');
        //return dd($productos);
        //return dd($despachoproducto);
        return view('admin.supermarket.edit', compact('supermarkets','productos','supermarketproducto','producto','supermarket','distribuidores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supermarket $supermarket)
    {
        $supermarket->update($request->all());
        // $despachoproducto->update ($request->all());
         return redirect()->route('admin.supermarket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supermarket $supermarket)
    {
        $supermarket->delete();
        return redirect()->route('admin.supermarket.index')->with('eliminar', 'ok');
    }

    public function pdf($id)
    {
        $distribuidores=Distribuidor::all();
        $user=User::all();
        $detalle=SupermarketProducto::all();
        $producto=Producto::all();
        $despacho=Supermarket::all();
        $pdf = Pdf::loadView('admin.supermarket.pdf', compact('user','detalle','producto','id','despacho','distribuidores'));
        return $pdf->stream();
        //return dd($despacho);
    }
}
