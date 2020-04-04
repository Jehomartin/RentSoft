@extends('layouts.layouts')
@section('titulo','Devoluciones')
@section('contenido')

<center><h1 style="color: orange">Bienvenido al apartado de Devoluciones </h1></center>

<div id="devoluciones">
	<br>
	<div class="container">
		<h3 style="color: turquoise">FOLIO : @{{folio_dev}}</h3>
		<h3 style="color: turquoise">FECHA DEVOLUCION : @{{fecha_devolucion}}</h3>

		<div class="row">
			<br>
			<div class="six columns">
				<div class="input-group">
					<input type="text" class="u-full-width" 
					v-model="codigo" ref="buscar"
					v-on:keyup.enter="getArticulo()">

					<span class="input-group-btn">
						<button type="button" class="button button-primary" @click="getArticulo()">
							Agregar
						</button>
					</span>
				</div>
				<br>
				<button class="button button-primary u-full-width" @click="devolver()">
					GUARDAR DEVOLUCION
				</button>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="six columns">
				<table class="u-full-width">
					<thead class="color2">
						<th>CLAVE</th>
						<th>NOMBRE</th>
						<th>Acciones</th>
					</thead>
					<tbody class="color1">
						<tr v-for="(r,index) in devoluciones">
							<td>@{{r.id_articulo}}</td>
							<td>@{{r.nombre}}</td>
							<td>
								<span class="button button-primary" @click="eliminarArticulo(index)">X</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="six columns">
				<!--<table class="table table-bordered">
					<tr>
						<th width="25%" class="">TOTAL :</th>
						<td><h2 class="text-danger">$ @{{total}}</h2></td>
					</tr>

					<tr>
						<th class="">PAGA CON : </th>
						<td><h2><input type="number" class="form-control" v-model="pago" min="0"></h2></td>
					</tr>

					<tr>
						<th class="">CAMBIO DE : </th>
						<td><h2 class="text-seccess">$ @{{cambio}}</h2></td>
					</tr>
				</table>-->

			</div>
		</div>
	</div>
	
</div>

@endsection

@push('scripts')
	<script src="js/vue-resource.js"></script>
	<script src="js/rentas/devoluciones.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
@endpush