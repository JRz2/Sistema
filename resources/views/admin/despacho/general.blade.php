       <table id="despachos" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Codigo</th>
                <th>Usuario</th>
                <th>Distribuidor</th>
                <th>fecha</th>
                <th>Acciones</th>
            </thead>
            <tbody> 
                @foreach ($despacho as $despacho)
                    <tr>
                        <td>{{$despacho->id}}</td>
                        <td>{{$despacho->codigo}}</td>
                        @foreach ($usuarios as $usuario)
                        @if ($despacho->user_id == $usuario->id)
                        <td>{{$usuario->name}}</td>
                        @endif 
                        @endforeach 
                        @foreach ($distribuidores as $distribuidor)
                        @if ($despacho->distribuidor_id == $distribuidor->id)
                        <td>{{$distribuidor->nombre}}</td>
                        @endif 
                        @endforeach 
                        <td>{{$despacho->fecha}}</td>
                        <td>
                            <a class="btn btn-outline-secondary" href="{{route('admin.despacho.show', $despacho)}}"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-outline-info" href="{{route('admin.despacho.edit', $despacho)}}"><i class="fa fa-pen"></i></a>
                            <form class="eliminar" action="{{route('admin.despacho.destroy', $despacho)}}" method="POST">
                                @csrf
                                @method('delete')
                                @can('admin.categoria.destroy')
                                <button class="btn btn-outline-danger" type="submit" ><i class='fa fa-trash'></i></button>
                                @endcan
                            </form> 
                        </td>
                    </tr>                       
                @endforeach
            </tbody>
        </table>