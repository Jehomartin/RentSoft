@extends('layouts.layout')
@section('titulo','Empleados')
@section('contenido')

<center><h1 style="color: orange">Bienvenido al apartado de Empleados</h1></center>

<div id="empleados">
	<div class="container">
		<div class="row">
			<div class="eight columns">
				<input type="text" placeholder="Escriba la clave o el nombre del empleado" class="u-full-width" v-model="buscar">
			</div>
			<p style="color: white">Buscando a : @{{buscar}}</p>
		</div>
	</div>
	<br><br>

	<div class="container">
		<div class="row">
			<div class="eight columns">
				<input type="text" name="" placeholder="clave de Empleado" class="u-full-width" v-model='id_empleado'>
				<input type="text" name="" placeholder="Nombre(s)" class="u-full-width" v-model="nombre">
				<input type="text" name="" placeholder="Apellidos" class="u-full-width" v-model="apellidos">
				<input type="text" name="" placeholder="Telefono" class="u-full-width" v-model="telefono">
				<input type="text" name="" placeholder="Contraseña" class="u-full-width" v-model="contrasenia">
				<input type="text" name="" placeholder="Edad" class="u-full-width" v-model="edad">
				<select class="u-full-width" v-model="sexo">
					<option disabled value="">Elija su sexo</option>
					<option>M</option>
					<option>F</option>
				</select>
				<select class="u-full-width" v-model="id_puesto" @change="getEmpleados">
					<option disabled value="">Elija un Puesto</option>
					<option v-for="p in puestos" v-bind:value="p.id_puesto">@{{p.puesto}}</option>
				</select>
			</div>
			<div class="four columns">
				<button class="button button-primary u-full-width" v-on:click="updateEmpleado(auxEmpleado)" v-if="editando"> Actualizar</button><br><br>

				<button class="button button-primary u-full-width" v-on:click="cancelarEdit()"> Cancelar</button><br><br>

				<button class="button button-primary u-full-width" v-on:click="agregarEmpleado()" v-if=!editando> Agregar</button>
			</div>
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
				<th>Edad</th>
				<th>Sexo</th>
				<th>Puesto</th>
				<th>Opciones</th>
			</thead>
			<tbody class="color1">
				<tr v-for="(empleado,index) in filtroEmpleados">
					<td>@{{ empleado.id_empleado }}</td>
					<td>@{{ empleado.nombre }}</td>
					<td>@{{ empleado.apellidos }}</td>
					<td>@{{ empleado.telefono }}</td>
					<td>@{{ empleado.contrasenia }}</td>
					<td>@{{ empleado.edad }}</td>
					<td>@{{ empleado.sexo }}</td>
					<td>@{{ empleado.id_puesto }}</td>
					<td>
						<span class="button button-primary" v-on:click="editEmpleado(empleado.id_empleado)">E</span>
						<span class="button button-primary" v-on:click="eliminarEmpleado(empleado.id_empleado)">X</span>
					</td>
				</tr>
			</tbody>
		</table>
		
	</div>
	
</div>

@endsection

@push('scripts')
	<script src="js/administracion/empleados.js"></script>
	<script src="js/vue-resource.js"></script>
@endpush