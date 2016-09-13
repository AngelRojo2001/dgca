@extends('templates.base')

@section('body')
	<!-- Navigation -->
	<nav class="navbar navbar-default" role="navigation">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
	            <a class="navbar-brand" href="registro">DGCA</a>
	        </div>
	        <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	            <ul class="nav navbar-nav">
	                <li>
	                    <a href="{{ url('inicio') }}">Inicio</a>
	                </li>
	                <li>
	                    <a href="{{ url('registro') }}">Registro</a>
	                </li>
	                <li class="dropdown">
	                  	<a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	                    	Búsqueda
	                    	<span class="caret"></span>
	                  	</a>
	                  	<ul class="dropdown-menu" aria-labelledby="dLabel">
	                    	<li><a href="{{ url('busqueda/ui') }}">Unidad Industrial</a></li>
	                    	<li><a href="{{ url('busqueda/rl') }}">Representante Legal</a></li>
	                  	</ul>
	                </li>
	                <li>
	                    <a href="{{ url('caeb') }}">Caeb</a>
	                </li>
	                <li class="dropdown">
	                  	<a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	                    	Encargados
	                    	<span class="caret"></span>
	                  	</a>
	                  	<ul class="dropdown-menu" aria-labelledby="dLabel">
	                    	<li><a href="{{ url('funcionario') }}">Funcionario</a></li>
	                    	<li><a href="{{ url('consultor') }}">Consultor</a></li>
	                  	</ul>
	                </li>
	                <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->login }} <i class="fa fa-caret-down"></i><span class="caret"></span>
	                    </a>
	                    <ul class="dropdown-menu dropdown-user">
	                        <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i>Salir</a></li>
	                    </ul><!-- /.dropdown-user -->
	                </li>
	            </ul>
	        </div>
	        <!-- /.navbar-collapse -->
	    </div>
	    <!-- /.container -->
	</nav>

	<div class="container">
		<div class="row">
		    <div class="box">
		        <div class="col-lg-12">
	    			@yield('container')
		        </div>
		    </div>
		</div>
	</div>
	<!-- /.container -->
@endsection