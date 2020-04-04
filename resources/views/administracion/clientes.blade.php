@extends('layouts.layout')
@section('titulo','Clientes')
@section('contenido')
<center><h1 style="color: orange">Bienvenido al apartado de Clientes</h1></center>

<div id="clientes">
	<div class="container">
		<div class="row">
			<div class="eight columns">
				<input type="text" placeholder="Escriba la clave o el nombre del cliente" class="u-full-width" 
				v-model="buscar">
			</div>
			<p style="color: white">Buscando a : @{{buscar}}</p>
		</div>
	</div>
	<br><br>

	<div class="container">
		<table class="u-full-width">

			<thead class="color2">
				<th>Clave</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Telefono</th>
				<th>Contrasenia</th>
				<th>Localidad</th>
				<th>Dirección</th>
				<th>Opciones</th>
			</thead>
			<tbody class="color1">
				<tr v-for="(user,index) in filtroClientes">
					<td>@{{ user.id_usuario }}</td>
					<td>@{{ user.nombre }}</td>
					<td>@{{ user.apellidos }}</td>
					<td>@{{ user.telefono }}</td>
					<td>@{{ user.contrasenia }}</td>
					<td>@{{ user.localidad }}</td>
					<td>@{{ user.direccion }}</td>
					<td>
						<!--<span class="btn btn-primary btn-xs glyphicon glyphicon-pencil" v-on:click="editCliente(user.id_usuario)"></span>-->
						<span class="button button-primary" v-on:click="eliminarCliente(user.id_usuario)">X</span>
					</td>
				</tr>
			</tbody>
		</table>
		
	</div>
	
</div>

@endsection

@push('scripts')
	<script src="js/administracion/clientes.js"></script>
	<script src="js/vue-resource.js"></script>
@endpush