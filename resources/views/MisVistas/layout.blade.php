<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css')}}">
	<!-- <link rel="stylesheet" type="text/css" href="css/facebox.css"> -->
	<link rel="stylesheet" type="text/css" id="cssArchivo"> 
	<link rel="icon" href="/img/cafe1.png">
  	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  	<script src="{{ asset('/js/jquery-ui.min.js')}}"></script>
	<script src="{{ asset('/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript"  src="{{asset('/js/cambiarCSS.js')}}"></script>
	
	@yield('header')
	
</head>
<body>
	<div class="container">
		<header>
			<div class="container">
				<div id="logoDIV" class="col-xs-12 col-sm-6 col-md-6">
					<img id="logo" src="/img/logo.png" alt="Logo cafe diem: desayunos a medida" height="160" width="230" >
				</div>
				<div class="contenedorH1 col-xs-12 col-sm-6 col-md-6">
					<h1>Cafe Diem</h1>
					 <h4 class="dam">Desayunos a medida :)</h4>
				<div>
			</div>
		
		</header>
		@yield('container')
		<footer>
			<h4 class="footerA">
			Desayunos Cafe Diem ®
			</h4>
			<h3  class="footerA">
			Bahía Blanca - Buenos Aires - Argentina
			</h3>
			<div id="readme" class="footerA">
				<a href="readme.html"> readme </a>
			</div>
		</footer>
	</div>

</body>
</html>
