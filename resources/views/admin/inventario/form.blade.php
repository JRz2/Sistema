<div class="container" style="margin-bottom: 100px;">
    <div class="form-row">       
        <div class="col-md-5 mb-3">
            {!! Form::label('codigo', 'Codigo')!!}
            {!! Form::text('codigo', null, ['class'=> 'form-control', 'placeholder'=>'Codigo', 'required']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-md-4 mb-3">
            {!! Form::label('fecha', 'Fecha')!!}
            {!! Form::date('fecha', null, ['class'=> 'form-control', 'placeholder'=>'fecha', 'required']) !!}
            <div class="valid-feedback">
                Looks good!
            </div>        
        </div>
    </div>
</div>



<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>