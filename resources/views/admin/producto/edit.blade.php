<a class="btn btn-outline-info" data-toggle="modal" data-target="#editModal{{$producto->id}}" href="{{route('admin.producto.edit', $producto)}}"><i class="fa fa-pen"> Editar</i></a> 

  <div class="modal fade" id="editModal{{$producto->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::model($producto,['route'=> ['admin.producto.update', $producto], 'method'=>'put', 'class'=>'editar']) !!}
            <div class="form-group">
                {!! Form::label('codigo', 'codigo del Prducto')!!}
                {!! Form::text('codigo', null, ['class'=> 'form-control', 'required']) !!} 
                @error('codigo')
                <span class="text-danger">{{$message}} </span>     
                @enderror
            </div>  
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del Prducto')!!}
                {!! Form::text('nombre', null, ['class'=> 'form-control', 'required']) !!} 
                @error('codigo')
                <span class="text-danger">{{$message}} </span>     
                @enderror
            </div> 
            <div class="form-group">
              {!! Form::label('categoria_id', 'Categoria del Producto')!!}           
              {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control']) !!} 
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
