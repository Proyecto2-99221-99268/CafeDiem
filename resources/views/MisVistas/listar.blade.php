@extends('MisVistas.layoutAdmin')

@section('header')
    <title>Listar Productos - Cafe Diem </title>
  	<script src="{{ asset('js/listar.js')}}"></script>
  	

@stop

@section('container')
		@if($errors->any())
	<div class="alert alert-warning alert-dismissable col-xs-12 col-sm-12 col-md-10">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Error!</strong>{{$errors->first()}}
  	</div>
	@endif
  <div class="main row">
  	

		
		<aside class=" col-xs-12 col-sm-12 col-md-12">
			<ul id="categorias_barra" class="nav nav-pills">
			  
			</ul>

			<div class="tab-content" id="categoria_contenedora">

		</aside>
		<div class="col-xs-12 col-sm-12 col-md-12">
		<a class="btn btn-primary" href="/" role="button">Ir a modelos</a>
		</div>
		
	</div>

@stop