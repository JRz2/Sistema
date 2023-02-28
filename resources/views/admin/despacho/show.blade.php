@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>DETALLE DE NOTA</h1>
@stop
@section('content')
<a class="btn btn-info" href="{{url ('/admin/despacho/pdf/' .$despacho->id)}}"><i class="fa fa-print"></i> IMPRIMIR PDF</a> 
{!! Form::model($despacho) !!}
<div class="card" style="margin-top: 20px">
    <div class="form-row">       
        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('codigo', 'Codigo')!!}
            <p>{{$despacho->codigo}}</p>
        </div>

        <div class="col-md-4 mb-3" style="text-align: center;">      
            {!! Form::label('user_id', 'Usuario')!!}
            @foreach ($user as $use)
                @if ($use->id==$despacho->user_id)
                    <p>{{$use->name}}</p>
                @endif
            @endforeach
        </div>

        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('fecha', 'Fecha')!!}   
            <p>{{$despacho->fecha}}</p>    
        </div>
    </div>  

    <div class="form-row">
        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('distribuidor_id', 'Distribuidor')!!}
            @foreach ($distribuidores as $distribuidor)
            @if ($despacho->distribuidor_id == $distribuidor->id)
            <p>{{$distribuidor->nombre}}</p>
            @endif 
            @endforeach 
        </div> 
        
        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('entradacanasta', 'Entrada de Canastillos')!!}
            <p>{{$despacho->entradacanasta}}</p>
        </div>

        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('salidacanasta', 'Salida de Canastillos')!!}
            <p>{{$despacho->salidacanasta}}</p>
        </div> 
    </div> 

</div>

{!! Form::close() !!}

<div class="card-body">
    <table id="productos" class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Despacho</th>
            <th>Producto</th>
            <th>Salida</th>
            <th>fecha de Vencimiento</th>
            <th>Devoluciones</th>
        </thead>
        <tbody>
            
            @foreach ($detalle as $deta)
            @if($despacho->id==$deta->despacho_id)
                <tr>
                    <td>{{$deta->id}}</td>
                    <td>{{$deta->despacho_id}}</td>
                    @foreach ($producto as $produ) 
                    @if ($deta->producto_id == $produ->id)
                    <td>{{$produ->nombre}}</td>
                    @endif 
                    @endforeach 
                    <td>{{$deta->salida}}</td>
                    <td>{{$deta->fvencimiento}}</td>
                    <td>{{$deta->devoluciones}}</td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop