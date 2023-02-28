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
                            <h2> DETALLE KARDEX</h2>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="car-body">
            {!! Form::model($kardex) !!}
            @foreach ($productos as $pro)
            @if ($kardex->producto_id==$pro->id)
            <div class="form-row">       
                <div class="col-md-4 mb-3">
                    {!! Form::label('codigo', 'Codigo')!!}
                    {!! Form::text('codigo', $pro->codigo, ['class'=> 'form-control', 'disabled']) !!}
                </div>

                <div class="col-md-4 mb-3">
                    {!! Form::label('producto_id', 'Producto')!!}
                    {!! Form::text('producto_id', $pro->nombre, ['class'=> 'form-control', 'disabled']) !!}    
                </div>
                <div class="col-md-4 mb-3">
                    {!! Form::label('categoria_id', 'Categoria')!!}
                    @foreach ($categorias as $cat)
                    @if ($pro->categoria_id==$cat->id)
                    {!! Form::text('categoria_id', $cat->nombre, ['class'=> 'form-control', 'disabled']) !!}
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
            {!! Form::close() !!}
        </div>   

        <br>
        <br>
    </div>

    <table id="inventario" class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Fecha</th>
            <th>Cantidad</th>  
            <th>Tipo</th>         
            <th>Distribuidor</th>           
            <th>Planilla</th>
        </thead>
        <tbody>
            @foreach ($detalle as $det)
                @if ($kardex->id== $det->kardex_id)
                <tr>
                    <td>{{$det->id}}</td>
                    <td>{{$det->fecha}}</td>
                    <td>{{$det->cantidad}}</td>
                    <td>{{$det->tipo}}</td>
                    @if ($det->despacho_producto_id !== null)
                        @foreach ($despa as $des)
                        @if ($det->despacho_producto_id == $des->id)
                        @foreach ($despachos as $desp)
                            @if ($des->despacho_id==$desp->id)
                            @foreach ($distribuidores as $dist)
                                @if ($dist->id==$desp->distribuidor_id)
                                <td>{{$dist->nombre}}</td>    
                                @endif
                            @endforeach              
                            <td>{{$desp->codigo}}</td>
                            @endif
                        @endforeach
                        @endif
                        @endforeach                        
                    @elseif($det->supermarket_producto_id !== null)

                        @foreach ($superm as $super)
                        @if ($det->supermarket_producto_id == $super->id)
                        @foreach ($supers as $sup)
                            @if ($super->supermarket_id==$sup->id)
                            @foreach ($distribuidores as $dist)
                                @if ($dist->id==$sup->distribuidor_id)
                                <td>{{$dist->nombre}}</td>    
                                @endif
                            @endforeach              
                            <td>{{$sup->codigo}}</td>
                            @endif
                        @endforeach
                        @endif
                        @endforeach  

                    @else

                    @foreach ($planta as $pla)
                    @if ($det->planta_producto_id == $pla->id)
                    @foreach ($plantas as $plan)
                        @if ($pla->planta_id==$plan->id)
                        @foreach ($distribuidores as $dist)
                            @if ($dist->id==$plan->distribuidor_id)
                            <td>{{$dist->nombre}}</td>    
                            @endif
                        @endforeach              
                        <td>{{$plan->codigo}}</td>
                        @endif
                    @endforeach
                    @endif
                    @endforeach 
                        
                    @endif
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    
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