@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-success" href="{{route('admin.rol.create')}}"><i class="fa fa-clipboard"></i> AGREGAR ROL</a>
    </div>
    <div class="card-body">
        <table id="usuarios" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Servicio</th>
                <th>Permisos</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($rol as $rol)
                    <tr>
                        <td>{{ $rol->id}}</td>
                        <td>{{ $rol->name}}</td>
                        <td>{{ $rol->guard_name}}</td> 
                        <td>
                            @forelse ($rol->permissions as $permission)
                            <span class="badge badge-info">{{$permission->name}}</span>
                            @empty
                            <span class="badge badge-danger">No asignado</span>
                            @endforelse
                        </td>            
                        <td>
                            <a class="btn btn-outline-info" href="{{route('admin.rol.edit', $rol)}}"><i class='fa fa-pen'></i></a>  
                        </td>
                        <td>
                            <form class="eliminar" action="{{route('admin.rol.destroy', $rol)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit" ><i class='fa fa-trash'></i></button> 
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.j"></script>
<script>
    $(document).ready(function() {
        $('#usuarios').DataTable({
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
        title: 'Rol Guardado',
        })
    </script>
@endif

@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
        'Eliminado!',
        'El Rol ah sido Eliminado.',
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
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                this.submit();
            } else if (result.isDenied) {
                Swal.fire('Cambios No Guardados', '', 'info')
            }
            })
    });
</script>
@stop