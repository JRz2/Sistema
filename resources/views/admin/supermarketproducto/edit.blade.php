<a class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$supermarketproducto->id}}" href="{{route('admin.supermarketproducto.edit', $supermarketproducto)}}">Editar</a>  
<div class="modal fade" id="editModal{{$supermarketproducto->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {!! Form::model($supermarketproducto,['route'=> ['admin.supermarketproducto.update', $supermarketproducto], 'method'=>'put']) !!}
            <div class="form-group">
              {!! Form::text('supermarket_id', null, ['class'=> 'form-control','hidden']) !!}
                @error('codigo')
                <span class="text-danger">{{$message}} </span>     
                @enderror
            </div>  
            <div class="form-group">
              {!! Form::label('producto_id', 'Nombre del Prducto')!!}
              {!! Form::select('producto_id', $productos, null, ['class'=>'form-control', 'required']) !!} 
                @error('codigo')
                <span class="text-danger">{{$message}} </span>     
                @enderror
            </div> 
            <div class="form-group">
              {!! Form::label('fvencimiento', 'Fecha de vencimiento')!!}
              {!! Form::date('fvencimiento', null, ['class'=> 'form-control', 'required']) !!} 
            </div> 
            <div class="form-group">
              {!! Form::label('salida', 'Salida de Producto')!!}
              {!! Form::text('salida', null, ['class'=> 'form-control']) !!} 
            </div>  
            <div class="form-group">
              {!! Form::label('devoluciones', 'Devoluciones')!!}
              {!! Form::text('devoluciones', null, ['class'=> 'form-control']) !!}  
            </div>           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit('Actualizar', ['class'=> 'btn btn-primary', 'id'=>'actualizar']) !!} 
        </div>
        {!! Form::close() !!} 
      </div>
    </div>
  </div>




  
 
  


     


 


           


        
