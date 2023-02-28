@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Despachos Planta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        @can('admin.prueba.create')
            <a class="btn btn-success" href="{{route('admin.prueba.create')}}"><i class="fa fa-clipboard"></i> AGREGAR NOTA</a> 
        @endcan
    </div>
    <div class="card-body">
        @can('gerentes')
        @include('admin.prueba.general')
        @endcan

        @can('encargados')
        <table id="despachos" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Codigo</th>
            <!--<th>Usuario</th>-->
                <th>Planta</th>
                <th>Distribuidor</th>
                <th>fecha</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($prueba as $prueba)
                @if ($prueba->user_id == $nombre)
                    <tr>
                        <td>{{$prueba->id}}</td>
                        <td>{{$prueba->codigo}}</td>
                        <!--@foreach ($usuarios as $usuario)
                        @if ($prueba->user_id == $usuario->id)
                        <td>{{$usuario->name}}</td>
                        @endif 
                        @endforeach -->
                        <td>{{$prueba->nombre}}</td>
                        @foreach ($distribuidores as $distribuidor)
                        @if ($prueba->distribuidor_id == $distribuidor->id)
                        <td>{{$distribuidor->nombre}}</td>
                        @endif 
                        @endforeach 
                        <td>{{$prueba->fecha}}</td>
                        <td width="200px">
                            @can('admin.prueba.show')
                            <a class="btn btn-outline-secondary" href="{{route('admin.prueba.show', $prueba)}}"><i class="fa fa-eye"></i></a> 
                            @endcan 
                            @can('admin.prueba.edit')
                            <a class="btn btn-outline-info" href="{{route('admin.prueba.edit', $prueba)}}"><i class="fa fa-pen"></i></a>
                            @endcan
                             <form class="eliminar" action="{{route('admin.prueba.destroy', $prueba)}}" method="POST">
                                @csrf
                                @method('delete')
                                @can('admin.prueba.destroy')
                                <button class="btn btn-outline-danger" type="submit" ><i class='fa fa-trash'></i></button>
                                @endcan
                            </form> 
                        </td>
                    </tr>                    
                @endif
                @endforeach
            </tbody>
        </table>
        @endcan

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.j"></script>
<script>
    $(document).ready(function() {
        $('#despachos').DataTable({
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

@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
        'Eliminado!',
        'La Nota ah sido Eliminada.',
        'success'
        )
</script>
@endif

<script>
    $('.eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Esta Seguro de eliminar?',
            text: "No podras recuperar el dato!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
                   this.submit();     
            }
            })

    });
</script>
@stop