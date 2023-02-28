<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribuidor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DistribuidorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.distribuidor.index')->only('index');
        $this->middleware('can:admin.distribuidor.create')->only('create','store');
        $this->middleware('can:admin.distribuidor.edit')->only('edit','update');
        $this->middleware('can:admin.distribuidor.destroy')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribuidor=Distribuidor::all();
        return view('admin.distribuidor.index', compact('distribuidor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.distribuidor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distribuidor=Distribuidor::create($request->all());
        return redirect()->route('admin.distribuidor.index')->with('guardar','ok');
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
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribuidor $distribuidor)
    {
        $distribuidor->update ($request->all());
        return redirect()->route('admin.distribuidor.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribuidor $distribuidor)
    {
        $distribuidor->delete();
        return redirect()->route('admin.distribuidor.index')->with('eliminar', 'ok');
    }

    public function pdf()
    {
        $distribuidor=Distribuidor::all();
        $pdf = Pdf::loadView('admin.distribuidor.pdf', compact('distribuidor'));
        return $pdf->stream(); 
    }
}
