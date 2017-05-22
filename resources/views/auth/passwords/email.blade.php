@extends('MisVistas.layout2')
@section('container')

 <div id="resetear">
  <h2>Resetear contraseña</h2>
</div>
 @if (Session::has('status'))
  <div class="alert alert-success">
   {{ Session::get('status') }}
  </div>
 @endif
 @if (count($errors) > 0)
  <div class="alert alert-danger">
   Los datos introducidos en el formulario son incorrectos.
  </div>
 @endif
 <hr />
 <form method="POST" action="email">
  {{csrf_field()}}
  <div class="form-group">
   <label for="email" id="resetear">Email</label>
   <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
   <div class="text-danger">{{$errors->first('email')}}</div>
  </div>
  <button type="submit" class="btn btn-primary">Obtener un enlace para resetear mi contraseña</button>
 </form>
@stop

