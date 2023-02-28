@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Detalles</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        @include('admin.plantaproducto.create')
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
                @foreach ($plantaproducto as $plantaproducto)
                    <tr>
                        <td>{{$plantaproducto->id}}</td>
                        <td>{{$plantaproducto->planta_id}}</td>
                        @foreach ($producto as $productoq) 
                        @if ($plantaproducto->producto_id == $productoq->id)
                        <td>{{$productoq->nombre}}</td>
                        @endif 
                        @endforeach 
                        <td>{{$plantaproducto->fvencimiento}}</td>
                        <td>{{$plantaproducto->salida}}</td>
                        <td>{{$plantaproducto->devoluciones}}</td>
                        <td width="100px">
                            @csrf
                            @include('admin.plantaproducto.edit', [$plantaproducto -> id])
                        </td>
                        <td width="100px">
                             <form action="{{route('admin.plantaproducto.destroy', $plantaproducto)}}" method="POST">
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