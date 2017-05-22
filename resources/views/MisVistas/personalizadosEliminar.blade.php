@extends('MisVistas.layout')

@section('header')
    <title>Eliminar Personalizados - Cafe Diem </title>



@stop

@section('container')
  
  <h3>  eliminar modelo</h3>
  <hr>
 	<table class="table table-hover">
   	@foreach($personalizados as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nombre }}</td>
            <td>
                {!! Form::open(array('url' => '/personalizados/'. $value->id ,'method' => 'delete')) !!}
    				{{Form::token()}}
					{{Form::submit('Eliminar!')}}

				{!! Form::close() !!}
             
            </td>
        </tr>
    @endforeach
    </table>
@stop