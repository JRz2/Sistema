<a class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$inventarioproducto->id}}" href="{{route('admin.inventarioproducto.edit', $inventarioproducto)}}">Editar</a>  
<div class="modal fade" id="editModal{{$inventarioproducto->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! Form::model($inventarioproducto,['route'=> ['admin.inventarioproducto.update', $inventarioproducto], 'method'=>'put']) !!}
            <div class="form-group">
              {!! Form::text('inventario_id', null, ['class'=> 'form-control','hidden']) !!}
              {!! Form::text('producto_id', null, ['class'=> 'form-control','hidden']) !!}
              @foreach ($producto as $pro)
              @if ($pro->id == $inventarioproducto->producto_id)
              {!! Form::label('producto_id', $pro->nombre, ['class'=> 'form-control']) !!}
              @endif 
              @endforeach 
            </div>  
            <div class="form-group">
              {!! Form::label('cierre', 'Cierre')!!}
              {!! Form::number('cierre', null, ['class'=> 'form-control', 'required']) !!} 
            </div> 
            <div class="form-group">
              {!! Form::label('ingreso', 'Ingreso')!!}
              {!! Form::number('ingreso', null, ['class'=> 'form-control']) !!} 
            </div>  
            <div class="form-group">
              {!! Form::label('despacho', 'Despacho')!!}
              {!! Form::number('despacho', null, ['class'=> 'form-control']) !!}  
            </div>   
            <div class="form-group">
              {!! Form::label('baja', 'Bajas')!!}
              {!! Form::number('baja', null, ['class'=> 'form-control']) !!}  
            </div>  
            <div class="form-group">
              {!! Form::label('stock', 'Stock')!!}
              {!! Form::number('stock', null, ['class'=> 'form-control']) !!}  
            </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit('Actualizar Categoria', ['class'=> 'btn btn-primary', 'id'=>'actualizar']) !!} 
        </div>
        {!! Form::close() !!} 
      </div>
    </div>
  </div>




  
 
  


     


 


           


        
