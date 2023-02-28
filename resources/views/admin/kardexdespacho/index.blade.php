@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Detalles</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">
        <table id="usuarios" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Despacho</th>
                <th>Kardex</th>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Distribuidor</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>Planilla</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($detalle as $detalle)
                    <tr>
                        <td>{{$detalle->id}}</td>
                        <td>{{$detalle->despacho_producto_id}}</td>
                        <td>{{$detalle->kardex_id}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$detalle->fecha}}</td>  
                        <td>{{$detalle->cantidad}}</td>   
                        <td>{{$detalle->tipo}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.j"></script>
<script>
    $(document).ready(function() {
        $('#usuarios').DataTable({
            "order":[[0,'desc']],
        "language":{
            "search": "Buscar",
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "info": "Mostrando pagina_PAGE_ de _PAGES_",
            "paginate": {
                        "previous": "Anterior",
                        "next":    "Siguiente",
                        "first": "Primero",
                        "last": "Ultimo"
                    }
        }
    });
    });
</script>
@stop