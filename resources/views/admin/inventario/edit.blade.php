@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="card-secondary mb-3" style="max-width: 25rem;" >
            <div class="card-header">
                <table width=100%>
                    <tr>
                        <td align="left" width=5%>
                            <h2><i class="fas fa-clipboard"></i></h2>
                        </td>
                        <td align="center">
                            <h2> EDITAR INVENTARIO</h2>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="car-body">
            {!! Form::model($inventario,['route'=> ['admin.inventario.update', $inventario], 'method'=>'put']) !!}
                <div class="form-row">       
                    <div class="col-md-5 mb-3">
                        {!! Form::label('codigo', 'Codigo')!!}
                        {!! Form::text('codigo', null, ['class'=> 'form-control', 'placeholder'=>'Codigo', 'required']) !!}
                    </div>
                    <div class="col-md-4 mb-3">
                        {!! Form::label('fecha', 'Fecha')!!}
                        {!! Form::date('fecha', null, ['class'=> 'form-control', 'placeholder'=>'fecha', 'required']) !!}    
                    </div>
                </div>
                {!! Form::submit('Actualizar Inventario', ['class'=> 'btn btn-primary', 'id'=>'editar']) !!}  
                {!! Form::close() !!}
        </div> 
      <br>
      <br>

        <table id="inventario" class="table table-striped">
                <thead>
                <th>ID</th>
                <th>Inventario</th>
                <th>Producto</th>
                <th>Cierre</th>
                <th>Ingresos</th>
                <th>Despachos</th>
                <th>baja</th>
                <th>Stock</th>
                <th></th>
                <th></th>
                </thead>
            <tbody>
                @foreach ($inventarioproducto as $inventarioproducto)
                @if ($inventarioproducto->inventario_id == $inventario->id)
                    <tr>
                        <td>{{$inventarioproducto->id}}</td>
                        <td>{{$inventario->codigo}}</td>
                        @foreach ($producto as $productoq) 
                        @if ($inventarioproducto->producto_id == $productoq->id)
                        <td>{{$productoq->nombre}}</td>
                        @endif 
                        @endforeach 
                        <td>{{$inventarioproducto->cierre}}</td>
                        <td>{{$inventarioproducto->ingreso}}</td>
                        <td>{{$inventarioproducto->despacho}}</td>
                        <td>{{$inventarioproducto->baja}}</td>
                        <td>{{$inventarioproducto->stock}}</td>
                        <td width="100px">
                            @csrf
                            @include('admin.inventarioproducto.edit')
                        </td>
                        <td width="100px">
                                <form action="{{route('admin.inventarioproducto.destroy', $inventarioproducto)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>   
                        </td>
                    </tr>
                    @endif 
                @endforeach
            </tbody>
    
        </table>
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
        $('#inventario').DataTable({
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