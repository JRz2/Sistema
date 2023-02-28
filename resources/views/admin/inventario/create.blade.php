<a class="btn btn-primary" data-toggle="modal" data-target="#editModal" href="{{route('admin.inventario.create')}}">AGREGAR INVENTARIO</a> 
  <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route'=> 'admin.inventario.store']) !!}            
            <div class="form-group">
                {!! Form::label('codigo', 'Codigo del inventario')!!}
                {!! Form::text('codigo', null, ['class'=> 'form-control', 'required']) !!} 
            </div>     
            <div class="form-group">
                {!! Form::label('fecha', 'Fecha' )!!}
                {!! Form::date('fecha', null, ['class'=> 'form-control', 'required']) !!} 
            </div> 
            <div class="form-group">
                {!! Form::label('mes', 'Mes Inventario')!!}
                {!! Form::text('mes', null, ['class'=> 'form-control', 'required']) !!} 
            </div>   
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit('Guardar Categoria', ['class'=> 'btn btn-primary','id'=>'agregar']) !!} 
        </div>
        {!! Form::close() !!} 
      </div>
    </div>
  </div>