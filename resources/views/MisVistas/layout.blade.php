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
<!-- 	<script src="{{ asset('js/app.js') }}"></script>
 -->	
	@yield('header')
	
</head>
<body>
	<div class="container">
		<header>
			<div class="container">
				<div class=" navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
				<div id="logoDIV" class="col-xs-12 col-sm-6 col-md-6">
					<img id="logo" src="/img/logo.png" alt="Logo cafe diem: desayunos a medida" height="160" width="230" >
				</div>
				<div class="contenedorH1 col-xs-12 col-sm-6 col-md-6">
					<h1>Cafe Diem</h1>
					 <h4 class="dam">Desayunos a medida :)</h4>

				</div>

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
