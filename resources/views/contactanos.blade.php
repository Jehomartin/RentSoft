@extends('layouts.master')
@section('titulo','Contactanos')
@section('contenido')
<div id="contactanos">
	<div class="container">

		<center><h1 style="color: gold">Contactanos</h1></center>

		<!--@{{SALUDO}}-->
		<center>
			<div v-for="dat in datos">
				<!--<font color="blue" face="arial black"><h2>RFC</h2></font>
				<h3>@{{dat.rfc}}</h3>-->

				<br>

				<font color="blue" face="arial black"><h2>NOMBRE</h2></font>
				<h3 style="color: #099">@{{dat.nombre}}</h3>

				<br>

				<font color="blue" face="arial black"><h2>ENCARGADO</h2></font>
				<h3 style="color: #099">@{{dat.encargado}}</h3>

				<br>

				<font color="blue" face="arial black"><h2>CORREO</h2></font>
				<h3 style="color: #099">@{{dat.correo}}</h3>

				<br>

				<font color="blue" face="arial black"><h2>TELEFONO</h2></font>
				<h3 style="color: #099">@{{dat.telefono}}</h3>

				<br>

				<font color="blue" face="arial black"><h2>DIRECCIÓN</h2></font>
				<h3 style="color: #099">@{{dat.direccion}}</h3>

				<br>

				<font color="blue" face="arial black"><h2>LOCALIDAD</h2></font>
				<h3 style="color: #099">@{{dat.localidad}}</h3>
			</div>
		</center>
	</div>
	
</div>

@endsection

@push('scripts')
<script src="js/vue-resource.js"></script>
<script src="js/contactos.js"></script>
@endpush