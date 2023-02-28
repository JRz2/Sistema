<a class="btn btn-success" data-toggle="modal" data-target="#editModal" href="{{route('admin.producto.create')}}"><i class="fa fa-clipboard"></i> AGREGAR PRODUCTO</a> 
  <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Nuevo Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route'=> 'admin.producto.store']) !!}  
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
              {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control', 'required']) !!} 
            </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit('Guardar Producto', ['class'=> 'btn btn-primary', 'id'=>'agregar']) !!} 
        </div>
        {!! Form::close() !!} 
      </div>
    </div>
  </div>