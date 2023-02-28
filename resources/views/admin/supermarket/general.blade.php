<table id="supermarket" class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Codigo</th>
        <th>Usuario</th>
        <th>Distribuidor</th>
        <th>fecha</th>
        <th>Super Mercado</th>
        <th>Sala</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($supermarket as $despachoSuper)
            <tr>
                <td>{{$despachoSuper->id}}</td>
                <td>{{$despachoSuper->codigo}}</td>
                @foreach ($usuarios as $usuario)
                @if ($despachoSuper->user_id == $usuario->id)
                <td>{{$usuario->name}}</td>
                @endif 
                @endforeach 
                @foreach ($distribuidores as $distribuidor)
                @if ($despachoSuper->distribuidor_id == $distribuidor->id)
                <td>{{$distribuidor->nombre}}</td>
                @endif 
                @endforeach 
                <td>{{$despachoSuper->fecha}}</td>
                <td>{{$despachoSuper->Supermercado}}</td>
                <td>{{$despachoSuper->sala}}</td>
                <td>
                    @can('admin.supermarket.show')  
                    <a class="btn btn-outline-secondary" href="{{route('admin.supermarket.show', $despachoSuper)}}"><i class="fa fa-eye"></i></a>
                    @endcan
                    @can('admin.supermarket.edit')
                    <a class="btn btn-outline-info" href="{{route('admin.supermarket.edit', $despachoSuper)}}"><i class="fa fa-pen"></i></a>
                    @endcan
                    <form class="eliminar" action="{{route('admin.supermarket.destroy', $despachoSuper)}}" method="POST"></form>
                    @csrf
                    @method('delete')
                    @can('admin.supermarket.destroy')
                    <button class="btn btn-outline-danger" type="submit" ><i class='fa fa-trash'></i></button>
                    @endcan
                </td>                      
            </tr>
        @endforeach
    </tbody>
</table>