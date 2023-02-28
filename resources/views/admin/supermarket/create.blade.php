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
                            <h2> NUEVA NOTA</h2>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="car-body">
            {!! Form::open(['route'=> 'admin.supermarket.store']) !!}
                @csrf
                @include('admin.supermarket.form')
                {!! Form::submit('Guardar Nota', ['class'=> 'btn btn-primary', 'id'=>'agregar']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#agregar').click(function(){
            alert();
        });
    });
    function alert(){
        Swal.fire({
                icon: 'success',
                title: 'PRODUCTO AGREGADO',
                showConfirmButton: false,
                timer: 3500
            })
    }
</script>

<script>
    $(document).ready(function(){
        $('#agregar').click(function(){
            agregar();
        });
    });
    var cont=0;
    
    function agregar(){
        producto_id=$("#producto_id option:selected").val();
        producto_nombre=$("#producto_id option:selected").text();
        salida=$("#salida").val();
        fvencimiento=$("#fvencimiento").val();
        devoluciones=$("#devoluciones").val();

        if(salida!=""){
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input name="producto_id[]" value="'+producto_id+'">'+producto_nombre+'</td><td><input type="number" name="salida[]" value="'+salida+'"></td><td><input type="date" name="fvencimiento[]" value="'+fvencimiento+'"></td><td><input type="number" name="devoluciones[]" value="'+devoluciones+'"></td></tr>';
            cont++;
            limpiar();
            $('#detalles').append(fila);
        }
    }

    function limpiar(){
        $("#producto_id").val("");
        $("#salida").val("salida").val("");
        $("#fvencimiento").val("fvencimiento").val("");
        $("#devoluciones").val("devoluciones").val("");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
@stop