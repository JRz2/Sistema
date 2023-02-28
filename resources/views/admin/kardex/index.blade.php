@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Kardex de Productos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="inventarios" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Codigo</th>
                <th>Prodcuto</th>
                <th>Categoria</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($kardex as $kardex)
                    <tr>
                        <td>{{$kardex->id}}</td>
                        @foreach ($productos as $pro)
                            @if ($kardex->producto_id==$pro->id)
                            <td>{{$pro->codigo}}</td>
                            <td>{{$pro->nombre}}</td>
                            @foreach ($categorias as $cat)
                            @if ($pro->categoria_id==$cat->id)
                            <td>{{$cat->nombre}}</td>
                            @endif
                            @endforeach
                            @endif
                        @endforeach
                        <td width="150px">
                            @can('admin.kardex.show')
                                <a class="btn btn-outline-info" href="{{route('admin.kardex.show', $kardex)}}"><i class="fa fa-eye"> Detalle</i></a>  
                            @endcan
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