@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3 id="totalProductos">3</h3>
          <p>Categorias</p>
        </div>

        <div class="icon">
          <i class="fas fa-solid fa-tag"></i>
        </div>
            <a href="{{route('admin.categoria.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3 id="totalConejos">2</h3>
          <p>Productos</p>
        </div>
        <div class="icon">
          <i class="fas fa-solid fa-file"></i>
        </div>
            <a href="{{route('admin.producto.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-secondary">
        <div class="inner">
          <h3 id="totalAlmacen">1</h3>
          <p>Distribuidores</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="{{route('admin.distribuidor.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-purple">
        <div class="inner">
          <h3 id="totalEmpleado">2</h3>
          <p>Despachos Generales</p>
        </div>
        <div class="icon">
          <i class="fas fa-truck"></i>
        </div>
        <a href="{{route('admin.despacho.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-teal">
        <div class="inner">
          <h3 id="totalProductos">3</h3>
          <p>Despacho SuperMercados</p>
        </div>
        <div class="icon">
          <i class="fas fa-store-alt"></i>
        </div>
        <a href="{{route('admin.supermarket.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-cyan">
        <div class="inner">
          <h3 id="totalConejos">2</h3>
          <p>Despachos Planta</p>
        </div>
        <div class="icon">
          <i class="fas fa-solid fa-industry"></i>
        </div>
            <a href="{{route('admin.prueba.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-pink">
        <div class="inner">
          <h3 id="totalAlmacen">1</h3>
          <p>Ventas</p>
        </div>
        <div class="icon">
          <i class="fas fa-cash-register"></i>
        </div>
        <a href="{{route('admin.distribuidor.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-primary">
        <div class="inner">
          <h3 id="totalEmpleado">2</h3>
          <p>Inventarios</p>
        </div>
        <div class="icon">
          <i class="fas fa-store"></i>
        </div>
        <a href="{{route('admin.inventario.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>


  <div class="col-lg-3 col-6">
    <div class="small-box bg-secondary">
      <div class="inner">
        <h3 id="totalAlmacen">1</h3>
        <p>Kardex</p>
      </div>
      <div class="icon">
        <i class="fas fa-book"></i>
      </div>
      <a href="{{route('admin.categoria.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
      
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop