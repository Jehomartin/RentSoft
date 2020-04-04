@extends('layouts.layout')
@section('titulo','Artículos')
@section('contenido')
<center><h1 style="color: orange">Bienvenido al apartado de Artículos</h1></center>

<div id="articulos">
	<div class="container">
		<div class="row">
			<div class="eight columns">
				<input type="text" placeholder="Escriba la clave o el nombre del Artículo" class="u-full-width" v-model="buscar">
			</div>
			<p style="color: white">Buscando : @{{buscar}}</p>
	</div>
	</div>
	<br><br>

	<div class="container">
		<div class="row">
			<div class="eight columns">
				<input type="text" name="" placeholder="clave del Artículo" class="u-full-width" v-model='id_articulo'>
				<input type="text" name="" placeholder="Nombre" class="u-full-width" v-model="nombre">
				<input type="text" name="" placeholder="Tipo" class="u-full-width" v-model="tipo">
				<input type="text" name="" placeholder="Disponible" class="u-full-width" v-model="disponible">
				<input type="text" name="" placeholder="Precio de Renta" class="u-full-width" v-model="precio">

			</div>
			<div class="four columns">
				<button class="button button-primary u-full-width" 
				v-on:click="updateArticulo(auxArticulo)" v-if="editando"> Actualizar</button><br><br>

				<button class="button button-primary u-full-width" 
				v-on:click="cancelarEdit()"> Cancelar</button><br><br>

				<button class="button button-primary u-full-width"
				v-on:click="agregarArticulo()" v-if=!editando>Agregar</button>
			</div>
		</div>
	</div>
	<br><br>

	<div class="container">
		<table class="u-full-width">

			<thead class="color2">
				<th>Clave</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Disponible</th>
				<th>Precio de Renta</th>
				<th>Opciones</th>
			</thead>
			<tbody class="color1">
				<tr v-for="(art,index) in filtroArticulos">
					<td>@{{ art.id_articulo }}</td>
					<td>@{{ art.nombre }}</td>
					<td>@{{ art.tipo }}</td>
					<td>@{{ art.disponible }}</td>
					<td>@{{ art.precio }}</td>
					<td>
						<span class="button button-primary" 
						v-on:click="editArticulo(art.id_articulo)">E</span>

						<span class="button button-primary" 
						v-on:click="eliminarArticulo(art.id_articulo)">X</span>
					</td>
				</tr>
			</tbody>
		</table>		
	</div>	
</div>

@endsection

@push('scripts')
	<script src="js/administracion/articulos.js"></script>
	<script src="js/vue-resource.js"></script>
@endpush