@extends('MisVistas.layoutAdmin')

@section('header')
    <title>Listar Productos - Cafe Diem </title>
  	<script src="{{ asset('/js/categorias.js')}}"></script>
  	
@stop

@section('container')
  
 <h3>  Modifique el producto</h3>
  <hr>
  <div id="formulario">
	  <form method="POST" action="/productos/edit" id="bootstrapSelectForm"  enctype="multipart/form-data">
		   <input type="hidden" name="id" value="{{$producto->id}}">
		  {{csrf_field()}}
		  <div class="form-group">
		    <label for="nombre"> nombre </label>
		    <input type="text" requiered class="form-control" id="nombre" name="nombre" value="{{$producto->nombre}}">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">Imagen Cargada</label>
		  	<img src="{{$producto->imagen}}">
		  </div>
		  <div class="form-group">
		    <label for="precio">precio</label>
		    <input type="number" min="0" step="0.1" required class="form-control" name="precio" id="precio" value="{{$producto->precio}}">
		  </div>
		  <div class="form-group">
		    <label>Categoria</label>
		    <select name="Categoria" id="Categoria" class="form-control selectpicker"></select>
		  </div>
		  <div class="form-group">
		    <input type="hidden" required class="form-control" name="idCategoria" id="idCategoria" value="1">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">Imagen</label>
		    <input type="file" name="imagen">
		  </div>
		  <div class="form-group">
		    <label for="x">x</label>
		    <input type="number" min="0" max="1" step="0.01" required class="form-control" id="x" value="{{$producto->x}}" name="x">
		  </div>
		    <div class="form-group">
		    <label for="y">y</label>
		    <input type="number" min="0" step="0.01" required class="form-control" id="y" value="{{$producto->y}}" name="y">
		  </div>
		    <div class="form-group">
		    <label for="w">w</label>
		    <input type="number" min="0"  step="0.01" required class="form-control" id="w" value="{{$producto->w}}" name="w">
		  </div>
		    <div class="form-group">
		    <label for="h">h</label>
		    <input type="number" min="0" step="0.01" required class="form-control" id="h" value="{{$producto->h}}" name="h">
		  </div>


	 	 <button type="submit" class="btn btn-primary">Modificar</button>
		</form>
	</div>
	<hr>
	<a class="btn btn-primary" href="/" role="button">ir a modelos</a>  
    <a class="btn btn-info" href="/productos/listar" role="button">ir a productos</a>  
@stop