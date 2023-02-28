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
                            <h2> EDITAR CATEGORIA</h2>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
  
        <div class="car-body">
            {!! Form::model($despachoproducto,['route'=> ['admin.despachoproducto.update', $despachoproducto], 'method'=>'put']) !!}
            <table id="usuarios" class="table table-striped">
                <thead>
                    <th>Despacho</th>
                    <th>Producto</th>
                    <th>Fecha Vencimiento</th>
                    <th>salida</th>
                    <th>Devoluciones</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($despachoproducto as $despachoproducto)
                        <tr>
                            <td>{!! Form::text('despacho_id', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>
                            <td>{!! Form::text('producto_id', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>
                            <td>{!! Form::text('fvencimiento', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>
                            <td>{!! Form::text('salida', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>
                            <td>{!! Form::text('devoluciones', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>               
                            <td width="100px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.despachoproducto.update', $despachoproducto)}}">Editar</a>
                            </td>
                            <td width="100px">
                                 <form action="{{route('admin.despachoproducto.destroy', $despachoproducto)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>   
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
             {!! Form::submit('Actualizar Detallea', ['class'=> 'btn btn-primary', 'id'=>'editar']) !!}  
            {!! Form::close() !!}
        </div>
    </div>



    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    Launch static backdrop modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::model($despachoproducto,['route'=> ['admin.despachoproducto.update', $despachoproducto], 'method'=>'put']) !!}
            <table id="usuarios" class="table table-striped">
                <thead>
                    <th>Despacho</th>
                    <th>Producto</th>
                    <th>Fecha Vencimiento</th>
                    <th>salida</th>
                    <th>Devoluciones</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                        <tr>
                            <td>{!! Form::text('despacho_id', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>
                            <td>{!! Form::text('producto_id', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>
                            <td>{!! Form::text('fvencimiento', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>
                            <td>{!! Form::text('salida', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>
                            <td>{!! Form::text('devoluciones', null, ['class'=> 'form-control', 'placeholder'=>'ingrese el Nombre de la Categoria']) !!}</td>               
                            <td width="100px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.despachoproducto.update', $despachoproducto)}}">Editar</a>
                            </td>
                            <td width="100px">
                                 <form action="{{route('admin.despachoproducto.destroy', $despachoproducto)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>   
                            </td>
                        </tr>
                </tbody>
            </table>
            {!! Form::submit('Actualizar Detallea', ['class'=> 'btn btn-primary', 'id'=>'editar']) !!}  
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#editar').click(function(){
            alert();
        });
    });
    function alert(){
        Swal.fire({
                icon: 'success',
                title: 'CATEGORIA ACTUALIZADA',
                showConfirmButton: false,
                timer: 3500
            })
    }
</script>
@stop



