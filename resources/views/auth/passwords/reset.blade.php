@extends('MisVistas.layout2')

@section('container')
<div id="resetear">
  <h2>Resetear contraseña</h2>
</div>


 @if (count($errors) > 0)
  <div class="alert alert-danger">
   Los datos introducidos en el formulario son incorrectos.
  </div>
 @endif
 <hr />
 <form method="POST" action="{{url('reset')}}">
  {{csrf_field()}}
  <input type="hidden" name="token" value="{{$token}}" />

  <div class="form-group" id="resetear">
   <label for="email" >Email:</label>
   <input type="email" class="form-control" name="email" value="{{Input::old('email')}}" />
   <div class="text-danger">{{$errors->first('email')}}</div>
  </div>

  <div class="form-group" id="resetear">
   <label for="password" >Contraseña:</label>
   <input type="password" class="form-control" name="password" />
   <div class="text-danger">{{$errors->first('password')}}</div>
  </div>

  <div class="form-group">
   <label for="password_confirmation" id="resetear">Confirmar Contraseña:</label>
   <input type="password" class="form-control" name="password_confirmation" />
  </div>
  <button type="submit" class="btn btn-primary">Resetear Contraseña</button>
 </form>



@stop


