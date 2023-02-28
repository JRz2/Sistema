@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Distribuidores</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        @can('admin.distribuidor.create')
        @include('admin.distribuidor.create')  
        @endcan
        <a class="btn btn-info float-right " href="{{'distribuidor/pdf'}}"><i class="fa fa-print"></i> IMPRIMIR PDF</a>
    </div>
    <div class="card-body">
        <table id="usuarios" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Celular</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($distribuidor as $distribuidor)
                    <tr>
                        <td>{{$distribuidor->id}}</td>
                        <td>{{$distribuidor->nombre}}</td>
                        <td>{{$distribuidor->paterno}}</td>
                        <td>{{$distribuidor->materno}}</td>
                        <td>{{$distribuidor->celular}}</td>             
                        <td width="100px">
                            @can('admin.distribuidor.edit')
                            @include('admin.distribuidor.edit', [$distribuidor -> id])  
                            @endcan
                        </td>
                        <td width="100px">
                            @can('admin.distribuidor.destroy')
                             <form class="eliminar" action="{{route('admin.distribuidor.destroy', $distribuidor)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" type="submit" ><i class='fa fa-trash'> Borrar</i></button>
                            </form>  
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.j"></script>
<script>
    $(document).ready(function() {
        $('#usuarios').DataTable({
            "order":[[0,'desc']],
           // "responsive":true,
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

@if (session('editar') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Cambios Guardados',
        })
    </script>
@endif

@if (session('guardar') == 'ok')
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Categoria Guardada',
        })
    </script>
@endif

@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
        'Eliminado!',
        'El Distribuidor ah sido Eliminado.',
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

<script>
    $('.editar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Guardar Cambios?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            denyButtonText: `No Guardar`,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            } else if (result.isDenied) {
                Swal.fire('Cambios No Guardados', '', 'info')
            }
            })
    });
</script>
@stop