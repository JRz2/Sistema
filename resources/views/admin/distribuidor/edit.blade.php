<a class="btn btn-outline-info" data-toggle="modal" data-target="#editModal{{$distribuidor->id}}" href="{{route('admin.distribuidor.edit', $distribuidor)}}"><i class="fa fa-pen"> Editar</i></a> 

  <div class="modal fade" id="editModal{{$distribuidor->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Editar Distribuidor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::model($distribuidor,['route'=> ['admin.distribuidor.update', $distribuidor], 'method'=>'put', 'class'=>'editar']) !!}  
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del Distribuidor')!!}
                {!! Form::text('nombre', null, ['class'=> 'form-control', 'required']) !!} 
                @error('nombre')
                <span class="text-danger">{{$message}} </span>     
                @enderror
            </div> 
            <div class="form-group">
                {!! Form::label('paterno', 'Apelido Paterno')!!}
                {!! Form::text('paterno', null, ['class'=> 'form-control','required']) !!} 
                @error('paterno')
                <span class="text-danger">{{$message}} </span>     
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('materno', 'Apellido Materno')!!}
                {!! Form::text('materno', null, ['class'=> 'form-control','required']) !!} 
                @error('materno')
                <span class="text-danger">{{$message}} </span>     
                @enderror
            </div>  
            <div class="form-group">
                {!! Form::label('celular', 'Celular')!!}
                {!! Form::number('celular', null, ['class'=> 'form-control', 'min'=>'60000000', 'max'=>'79999999', 'required']) !!} 
                @error('celular')
                <span class="text-danger">{{$message}} </span>     
                @enderror
            </div>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit('Actualizar Distribuidor', ['class'=> 'btn btn-primary', 'id'=>'actualizar']) !!} 
        </div>
        {!! Form::close() !!} 
      </div>
    </div>
  </div>
