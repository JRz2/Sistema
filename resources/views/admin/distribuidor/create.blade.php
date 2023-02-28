<a class="btn btn-success" data-toggle="modal" data-target="#editModal" href="{{route('admin.distribuidor.create')}}"> <i class="fa fa-clipboard"></i> AGREGAR DISTRIBUIDOR</a> 
  <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Nuevo Distribuidor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route'=> 'admin.distribuidor.store']) !!}            
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del Distribuidor')!!}
                {!! Form::text('nombre', null, ['class'=> 'form-control', 'required']) !!} 
            </div> 
            <div class="form-group">
                {!! Form::label('paterno', 'Apelido Paterno')!!}
                {!! Form::text('paterno', null, ['class'=> 'form-control', 'required']) !!} 
            </div>
            <div class="form-group">
                {!! Form::label('materno', 'Apellido Materno')!!}
                {!! Form::text('materno', null, ['class'=> 'form-control', 'required']) !!} 
            </div>  
            <div class="form-group">
                {!! Form::label('celular', 'Celular')!!}
                {!! Form::number('celular', null, ['class'=> 'form-control', 'min'=>'60000000', 'max'=>'79999999', 'required']) !!} 
            </div>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit('Guardar Distribuidor', ['class'=> 'btn btn-primary','id'=>'agregar']) !!} 
        </div>
        {!! Form::close() !!} 
      </div>
    </div>
  </div>