<a class="btn btn-outline-info" data-toggle="modal" data-target="#editModal{{$categoria->id}}" href="{{route('admin.categoria.edit', $categoria)}}"><i  class="fa fa-pen"> Editar</i></a> 

  <div class="modal fade" id="editModal{{$categoria->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::model($categoria,['route'=> ['admin.categoria.update', $categoria], 'method'=>'put', 'class'=>'editar']) !!}
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre de la Categoria')!!}
                {!! Form::text('nombre', null, ['class'=> 'form-control', 'required']) !!} 
                @error('nombre')
                <span class="text-danger">{{$message}} </span>     
                @enderror
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

