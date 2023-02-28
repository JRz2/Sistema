<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;

use function GuzzleHttp\Promise\all;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.producto.index')->only('index');
        $this->middleware('can:admin.producto.create')->only('create','store');
        $this->middleware('can:admin.producto.edit')->only('edit','update');
        $this->middleware('can:admin.producto.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categorias = Categoria::pluck('nombre','id');
        $categoria=Categoria::all();
        $categorias = Categoria::pluck('nombre','id');
        $producto=Producto::all();
        return view('admin.producto.index', compact('producto','categoria','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('nombre','id');
        return view('admin.producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([    
            'codigo'=>'required|unique:productos',
            'nombre'=>'required',
            'categoria_id'=>'required',

        ]);
        $prodcuto=Producto::create($request->all());
        return redirect()->route('admin.producto.index')->with('guardar','ok');
       //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('admin.producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::pluck('nombre','id');
        return view('admin.producto.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([ 
            'codigo'=>"required|unique:productos,codigo,$producto->id",
            //'codigo'=>"required|unique:producto,codigo.$producto->id",
            'nombre'=>'required',
            'categoria_id'=>'required',
        ]);

        $producto->update($request->all());
        return redirect()->route('admin.producto.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.producto.index')->with('eliminar', 'ok');
    }
    public function pdf()
    {
        $categoria=Categoria::all();
        $categorias = Categoria::pluck('nombre','id');
        $producto=Producto::all();
        $pdf = Pdf::loadView('admin.producto.pdf', compact('producto','categoria','categorias'));
        return $pdf->stream();  
       //return view('admin.user.index',compact('user'));
        //return $pdf->download('invoice.pdf');
        //return view('admin.user.pdf',compact('user'));
    }
}
