@extends('MisVistas.layoutAdmin')

@section('header')
    <title>Eliminar Personalizados - Cafe Diem </title>



@stop

@section('container')
  
  <h3>  eliminar modelo</h3>
  <table class="table table-hover">
 	<tr>
    <th>Modelo desayuno</th> 
    <th>Eliminar</th>
  </tr>
   	@foreach($personalizados as $key => $value)
        <tr>
            <td>{{ $value->nombre }}</td>
            <td>
                {!! Form::open(array('url' => '/personalizados/'. $value->id ,'method' => 'delete')) !!}
    				{{Form::token()}}
					{{Form::submit('Eliminar!' ,array('class' => 'btn btn-danger'))}}

				{!! Form::close() !!}
             
            </td>
        </tr>
    @endforeach
    </table>
    <hr>
	<a class="btn btn-primary" href="/" role="button">ir a modelos</a>  
    <a class="btn btn-info" href="/productos/listar" role="button">ir a productos</a>  
@stop