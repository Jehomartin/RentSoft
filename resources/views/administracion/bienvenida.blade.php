@extends('layouts.layout')
@section('titulo','Administracion')
@section('contenido')

<center><h1 style="color: blue">Usuario: </h1> <h2>{{Session::get('usuario')}}</h2></center>
<br>
<center><h1 style="color: blue">Puesto: </h1> <h2>{{Session::get('puesto')}}</h2></center>
<br>
<center><h1 class="titlo">Bienvenido al apartado Administrativo</h1></center>
<br>

<div class="container">
	<div class="row">
		<div class="four columns">
			<img src="img/empleados.png" width="300" height="300" >		
		</div>
		<div class="four columns">
			<img src="img/logo/logo1.png" width="300" height="300">		
		</div>
		<div class="four columns">
			<img src="img/productos11.png" width="300" height="300" >		
		</div>
	</div>
	
</div>


@endsection

@push('scripts')
	<!--<script src="js/vue-resource.js"></script>
	<script src="js/rentas/rentas.js"></script>
	<script src="js/moment-with-locales.min.js"></script>-->
@endpush