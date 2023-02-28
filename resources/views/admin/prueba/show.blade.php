@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>DETALLE DE NOTA</h1>
@stop
@section('content')
<a class="btn btn-secondary" href="{{url ('/admin/prueba/pdf/' .$prueba->id)}}">IMPRIMIR PDF</a> 

{!! Form::model($prueba) !!}
<div class="card" style="margin-top: 20px">
    <div class="form-row">       
        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('codigo', 'Codigo')!!}
            <p>{{$prueba->codigo}}</p>
        </div>

        <div class="col-md-4 mb-3" style="text-align: center;">      
            {!! Form::label('user_id', 'Usuario')!!}
            @foreach ($user as $use)
                @if ($use->id==$prueba->user_id)
                    <p>{{$use->name}}</p>
                @endif
            @endforeach
        </div>

        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('fecha', 'Fecha')!!}   
            <p>{{$prueba->fecha}}</p>    
        </div>
    </div>  

    <div class="form-row">
        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('entradacanasta', 'Entrada de Canastillos')!!}
            <p>{{$prueba->entradacanasta}}</p>
        </div>

        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('salidacanasta', 'Salida de Canastillos')!!}
            <p>{{$prueba->salidacanasta}}</p>
        </div> 

        <div class="col-md-4 mb-3" style="text-align: center;">
            {!! Form::label('salidacanasta', 'Salida de Canastillos')!!}
            <p>{{$prueba->salidacanasta}}</p>
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
            @if($prueba->id==$deta->planta_id)
                <tr>
                    <td>{{$deta->id}}</td>
                    <td>{{$deta->planta_id}}</td>
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