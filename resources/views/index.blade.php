@extends('layouts.master')
@section('titulo','Inicio')
@section('contenido')

<link rel="stylesheet" type="text/css" href="css/index.css">

<center><h1 style="color: white">Usuario: </h1> <h2>{{Session::get('usuario')}}</h2></center>
<br>
<center><font size="7" color="gold" face="algerian">Bienvenido a Nuestra Página</font></center>

<center><div class="container">
	<div class="row">
		<div class="twelve columns">
			<img src="img/logo/logo1.png" width="400" height="400">	
		</div>

		<!-- <center><div class="estado">
			<div class="carrusel">
				<div class="imagenes_efecto" >
					<figure><h3>Disfraces de Halloween</h3>
						<a href="{{url('prendas')}}"><img src="img/art/it2.jpeg"></a>
					</figure>
					<figure><h3>Muebles para fiestas </h3>
						<a href="{{url('muebles')}}"><img src="img/art/toldo.jpeg"></a>
					</figure>
					<figure><h3>Disfraces para navidad </h3>
						<a href="{{url('prendas')}}"><img src="img/art/santa.jpeg"></a>
					</figure>
					<figure><h3>Disfraces para primavera</h3>
						<a href="{{url('prendas')}}"><img src="img/art/hada2.jpeg"></a>
					</figure>
					<figure><h3>Toldos</h3>
						<a href="{{url('muebles')}}"><img src="img/art/toldos.jpeg"></a>
					</figure>
				</div>
			</div>
		</div></center> -->

	</div>
</div></center>

@endsection

@push('scripts')

@endpush