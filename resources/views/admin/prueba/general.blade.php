<table id="despachos" class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Codigo</th>
        <th>Usuario</th>
        <th>Planta</th>
        <th>Distribuidor</th>
        <th>fecha</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($prueba as $prueba)
            <tr>
                <td>{{$prueba->id}}</td>
                <td>{{$prueba->codigo}}</td>
                @foreach ($usuarios as $usuario)
                @if ($prueba->user_id == $usuario->id)
                <td>{{$usuario->name}}</td>
                @endif 
                @endforeach
                <td>{{$prueba->nombre}}</td>
                @foreach ($distribuidores as $distribuidor)
                @if ($prueba->distribuidor_id == $distribuidor->id)
                <td>{{$distribuidor->nombre}}</td>
                @endif 
                @endforeach 
                <td>{{$prueba->fecha}}</td>
                <td>
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
        @endforeach
    </tbody>
</table>