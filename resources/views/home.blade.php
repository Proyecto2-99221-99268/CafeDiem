@extends('MisVistas.layout')
@section('container')
<h1>Bienvenid@s a la aplicación Laravel</h1>

@if (Session::has('status'))
<div class='text-success'>
    {{Session::get('status')}}
</div>
@endif

@stop
