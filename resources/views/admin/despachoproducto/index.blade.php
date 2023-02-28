@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Detalles</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        @include('admin.despachoproducto.create')
    </div>

    <div class="card-body">
        <table id="usuarios" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Dspacho</th>
                <th>Producto</th>
                <th>Fecha Vencimiento</th>
                <th>Salidas</th>
                <th>devoluciones</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($despachoproducto as $despachoproducto)
                    <tr>
                        <td>{{$despachoproducto->id}}</td>
                        <td>{{$despachoproducto->despacho_id}}</td>
                        @foreach ($producto as $productoq) 
                        @if ($despachoproducto->producto_id == $productoq->id)
                        <td>{{$productoq->nombre}}</td>
                        @endif 
                        @endforeach 
                        <td>{{$despachoproducto->fvencimiento}}</td>
                        <td>{{$despachoproducto->salida}}</td>
                        <td>{{$despachoproducto->devoluciones}}</td>
                        <td width="100px">
                            @csrf
                            @include('admin.despachoproducto.edit', [$despachoproducto -> id])
                        </td>
                        <td width="100px">
                             <form action="{{route('admin.despachoproducto.destroy', $despachoproducto)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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