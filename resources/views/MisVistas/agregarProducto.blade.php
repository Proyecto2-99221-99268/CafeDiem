@extends('MisVistas.layoutAdmin')

@section('header')
    <title>Crear Producto - Cafe Diem </title>
  	<script src="{{ asset('/js/categorias.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
 --}}

@stop

@section('container')
  
  <h3>  ingrese el producto</h3>
  <hr>
  <form method="POST" action="/productos/crear" id="bootstrapSelectForm"  enctype="multipart/form-data">
	  {{csrf_field()}}
	  <div class="form-group">
	    <label for="nombre">Nombre</label>
	    <input type="text" requiered class="form-control" id="nombre" name="nombre" placeholder="nombre">
	  </div>
	  <div class="form-group">
	    <label for="precio">precio</label>
	    <input type="number" min="0" step="0.01" required class="form-control" name="precio" id="precio" placeholder="0.00">
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
	    <input type="number" min="0" max="1" step="0.01" required class="form-control" id="x" placeholder="0.00" name="x">
	  </div>
	    <div class="form-group">
	    <label for="y">y</label>
	    <input type="number" min="0" step="0.01" required class="form-control" id="y" placeholder="0.00" name="y">
	  </div>
	    <div class="form-group">
	    <label for="w">w</label>
	    <input type="number" min="0"  step="0.01" required class="form-control" id="w" placeholder="0.00" name="w">
	  </div>
	    <div class="form-group">
	    <label for="h">h</label>
	    <input type="number" min="0" step="0.01" required class="form-control" id="h" placeholder="0.00" name="h">
	  </div>


	  <button type="submit" class="btn btn-primary">agregar</button>
</form>
<hr>
	<a class="btn btn-primary" href="/" role="button">ir a modelos</a>  
    <a class="btn btn-info" href="/productos/listar" role="button">ir a productos</a>  
@stop