@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Inventarios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        @can('admin.inventario.create')
            @include('admin.inventario.create')
        @endcan

    </div>
    <div class="card-body">
        <table id="inventarios" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Codigo</th>
                <th>fecha</th>
                <th>Mes</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($inventario as $inventario)
                    <tr>
                        <td>{{$inventario->id}}</td>
                        <td>{{$inventario->codigo}}</td>
                        <td>{{$inventario->fecha}}</td>
                        <td></td>
                        <td width="250px">
                             <form action="{{route('admin.inventario.destroy', $inventario)}}" method="POST">
                                @can('admin.inventario.show')
                                <a class="btn btn-primary btn-sm" href="{{route('admin.inventario.show', $inventario)}}">Detalle</a> 
                                @endcan 
                                @can('admin.inventario.edit')
                                <a class="btn btn-primary btn-sm" href="{{route('admin.inventario.edit', $inventario)}}">Editar</a>
                                @endcan
                                @csrf
                                @method('delete')
                                @can('admin.inventario.destroy')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                @endcan
                            </form> 
                        </td>
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
        $('#inventarios').DataTable({
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