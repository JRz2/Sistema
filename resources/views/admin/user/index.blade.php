@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn btn-success" href="{{route('admin.user.create')}}"><i class="fa fa-clipboard"></i> AGREGAR USUARIO</a>
        <a class="btn btn-info float-right " href="{{'use/pdf'}}"> <i class="fa fa-print"></i> IMPRIMIR PDF</a>
    </div>
    <div class="card-body">
        <table id="usuarios" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($user as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>  
                        <td>
                            @forelse ($user->roles as $rol)
                            <span class="badge badge-info">{{$rol->name}}</span>
                            @empty
                            <span class="badge badge-danger">No asignado</span>
                            @endforelse
                        </td>
                        <td width="300px">
                            <a class="btn btn-outline-warning" href="{{route('admin.user.edit', $user)}}"><i class="fa fa-user-secret"></i></a>
                            @include('admin.user.roles', [$user -> id]) 
                            <form class="d-inline eliminar" action="{{route('admin.user.destroy', $user)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" type="submit"><i class='fa fa-trash'></i></button>         
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script src="sweetalert2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
        title: 'Usuario Guardado',
        })
    </script>
@endif

@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
        'Eliminado!',
        'El usuario ah sido Eliminado.',
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