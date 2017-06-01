<?php $__env->startSection('header'); ?>
	<title>Cafe Diem</title>

	<link rel="stylesheet" src="<?php echo e(asset('/css/jquery-ui.css')); ?>">

  	<script src="<?php echo e(asset('/js/kinetic-v5.1.0.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/js/facebox-bootstrap.js')); ?>"></script>

	<script type="text/javascript"  src="<?php echo e(asset('/js/configuracionPanel.js')); ?>"></script>
	<meta name="_token" content="<?php echo e(csrf_token()); ?>">

	<?php if(Auth::guest()): ?>
      	<script type="text/javascript"  src="<?php echo e(asset('/js/guardarLocalhost.js')); ?>"></script>
	<?php elseif(Auth::check()): ?>
      	<?php if(Auth::user()->esAdmin): ?>
			<script type="text/javascript"  src="<?php echo e(asset('/js/guardarPredefinidosAdmin.js')); ?>"></script>
		<?php else: ?>
          	<script type="text/javascript"  src="<?php echo e(asset('/js/guardarUsr.js')); ?>"></script>
			<input type="hidden" id="userID" value="<?php echo e(Auth::user()->id); ?>">

 	    <?php endif; ?>
 	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>	 
		<div  class="noPadding col-xs-12 col-sm-12 col-md-12">
			<h3 class="presentacion">Regalale un desayuno a esa persona que tanto querés. Elegí uno de los modelos o animate a armar tu propio desayuno!
			</h3>
		</div>
		<nav id="navegacion" class="navbar navbar-default barraContenedora radioChico" role="navigation">
			<div id="modelos" class="navbar-header col-xs-12 col-sm-12 col-md-12 barra radioChico">
              <?php if(Auth::guest()): ?>
               <button type="button" id="b0" class="btn btn-default DP col-xs-6 col-sm-3 col-md-3 botonesBarra sizeLetra">Personalizado</button>
              <?php elseif(Auth::check()): ?>
              	<?php if(Auth::user()->esAdmin): ?>
				<button type="button" id="b0" class="btn btn-default DP col-xs-6 col-sm-3 col-md-3 botonesBarra sizeLetra">Nuevo</button>
      		  	<?php else: ?>
          		<button type="button" id="b0" class="btn btn-default DP col-xs-6 col-sm-3 col-md-3 botonesBarra sizeLetra">Personalizado</button>
 	   		 	<?php endif; ?>
 		     <?php endif; ?>
			</div>
		</nav>
		<nav id="modelosUsuario" class="navbar navbar-default barraContenedora radioChico">
		</nav>
		<div class="col-xs-12 col-sm-12 col-md-12 ">
		<?php if(Auth::check()): ?>
              	<?php if(Auth::user()->esAdmin): ?>
              	<a class="btn btn-danger" href="/personalizados/eliminar" role="button">ir a Eliminar modelos</a>
              	<a class="btn btn-info" href="/productos/listar" role="button">ir a productos</a>
              	<?php endif; ?>
        <?php endif; ?>
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
					<div  class="col-xs-3  col-sm-3 col-md-3 noPaddingCostado">
						<button id="compartir" alt="compartir" title="Compartir" class="botones radioGrande"></button>
					</div>
					<div id="enlaceCompartir" class="alert alert-info collapse col-xs-12  col-sm-12 col-md-9">
					  <strong>Compartir</strong>  <a id="enlacePosta" href="" class="alert-link">este enlace </a>con tus amigos.
					</div>
				</div>
			</div>
			<div id="cambiarCSSDIV" class="col-xs-12 col-sm-6 col-md-6">
				<button id="cambiarCSS" title="¡Cambiar apariencia!" class="pull-right botones radioGrande" class="botones "></button>
			</div>
		</div>
		<div id="cartel"></div> 	

		
<?php $__env->stopSection(); ?>

<?php echo $__env->make('MisVistas.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>