@extends('MisVistas.layout')

@section('header')
	<title>Cafe Diem</title>

	<link rel="stylesheet" src="{{ asset('/css/jquery-ui.css')}}">

  	<script src="{{ asset('/js/kinetic-v5.1.0.min.js')}}"></script>
	<script src="{{ asset('/js/facebox-bootstrap.js')}}"></script>

	<script type="text/javascript"  src="{{ asset('/js/configuracionPanel.js')}}"></script>
	
	@if(Auth::guest())
      	<script type="text/javascript"  src="{{ asset('/js/guardarLocalhost.js')}}"></script>
	@elseif (Auth::check())
      	@if(Auth::user()->esAdmin)
			<script type="text/javascript"  src="{{ asset('/js/guardarPredefinidosAdmin.js')}}"></script>
			<meta name="_token" content="{{ csrf_token() }}">


      	@else
          	<script type="text/javascript"  src="{{ asset('/js/guardarUsr.js')}}"></script>
			<meta name="_token" content="{{ csrf_token() }}">
			<input type="hidden" id="userID" value="{{Auth::user()->id }}">

 	    @endif
 	@endif
@stop
@section ('container')	 
		<div  class="noPadding col-xs-12 col-sm-12 col-md-12">
			<h3 class="presentacion">Regalale un desayuno a esa persona que tanto querés. Elegí uno de los modelos o animate a armar tu propio desayuno!
			</h3>
		</div>
		<nav id="navegacion" class="navbar navbar-default barraContenedora radioChico" role="navigation">
			<div id="modelos" class="navbar-header col-xs-12 col-sm-12 col-md-12 barra radioChico">
              @if(Auth::guest())
               <button type="button" id="b0" class="btn btn-default DP col-xs-6 col-sm-3 col-md-3 botonesBarra sizeLetra">Personalizado</button>
              @elseif (Auth::check())
              	@if(Auth::user()->esAdmin)
				<button type="button" id="b0" class="btn btn-default DP col-xs-6 col-sm-3 col-md-3 botonesBarra sizeLetra">Nuevo</button>
      		  	@else
          		<button type="button" id="b0" class="btn btn-default DP col-xs-6 col-sm-3 col-md-3 botonesBarra sizeLetra">Personalizado</button>
 	   		 	@endif
 		     @endif
			</div>
		</nav>
		<div class="col-xs-12 col-sm-12 col-md-12 ">
		@if (Auth::check())
              	@if(Auth::user()->esAdmin)
              	<a class="btn btn-danger" href="/personalizados/eliminar" role="button">ir a Eliminar modelos</a>
              	<a class="btn btn-info" href="/productos/listar" role="button">ir a productos</a>
              	@endif
        @endif
		</div>
		<div class="main row">
			<div  id="miCanvas" class="noPadding col-xs-12 col-sm-6 col-md-6">
			</div>
			<aside class=" col-xs-12 col-sm-6 col-md-6">
				<ul id="categorias_barra" class="nav nav-pills">
				  
				</ul>

				<div class="tab-content" id="categoria_contenedora">
				 
				</div>			

			</aside>
		</div>
		<div class="row">
			<div  class="col-xs-12 col-sm-6 col-md-6 noPaddingLeft mt5">
				<div class="col-xs-12 col-sm-2 col-md-2 noPaddingLeft">
					<div id="precio"  class=" col-xs-12 col-sm-12 col-md-12 PaddingLeft">
						Total $0.00
					</div>
				</div>
				<div class="col-xs-12 col-sm-10 col-md-10 noPaddingCostado mt5">

					<div  class="col-xs-3 col-sm-3 col-md-3 noPaddingCostado ">
						<button id="comprar" alt="comprar"  title="Comprar" class="botones radioGrande"></button>
					</div>
					<div  class="col-xs-3  col-sm-3 col-md-3 noPaddingCostado">
						<button id="guardar"  alt="guardar" title="Guardar desayuno" class="botones radioGrande"></button>
						
					</div>
					<div  class="col-xs-3  col-sm-3 col-md-3 noPaddingCostado">
						<button id="cargar" alt="cargar" title="Cargar desayuno guardado" class="botones radioGrande"></button>
					</div>
					<div  class="col-xs-3  col-sm-3 col-md-3 noPaddingCostado">
						<button id="borrar" alt="borrar" title="Borrar" class="botones radioGrande"></button>
					</div>
					
				</div>
			</div>
			<div id="cambiarCSSDIV" class="col-xs-12 col-sm-6 col-md-6">
				<button id="cambiarCSS" title="¡Cambiar apariencia!" class="pull-right botones radioGrande" class="botones "></button>
			</div>
		</div>
		<div id="cartel"></div> 	

		
@stop
