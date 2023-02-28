@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Pedidos</h1>
@stop

@section('content')
    <div class="car">
        <div class="car-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID_Distribuidor</th>
                        <th>Distribuidor</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->user_id}}</td>
                        <td>{{$pedido->user_nombre}}</td>
                        <td>{{$pedido->producto_nombre}}</td>
                        <td>{{$pedido->cantidad}}</td>
                    </tr>
                     @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop