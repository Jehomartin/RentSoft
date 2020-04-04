@extends('layouts.layouts')
@section('titulo','Rentas')
@section('contenido')

<center><h1 style="color: orange">Bienvenido al apartado de Rentas</h1></center>

<div id="rentas">
	<br>
	<div class="container">
		<h3 style="color: turquoise">FOLIO : @{{folio}}</h3>
		<h3 style="color: turquoise">FECHA RENTA : @{{fecha_renta}}</h3>

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
				<button class="button button-primary u-full-width" @click="rentar()">
					GUARDAR RENTA
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
						<th width="15%">PRECIO</th>
						<th width="15%">TOTAL</th>
						<th>Acciones</th>
					</thead>
					<tbody class="color1">
						<tr v-for="(r,index) in rentas">
							<td>@{{r.id_articulo}}</td>
							<td>@{{r.nombre}}</td>
							<td>@{{r.precio}}</td>
							<td><b>$ @{{totalArticulo(index)}}</b></td>
							<td>
								<!--<span class="glyphicon glyphicon-plus btn btn-xs btn-primary" @click="addArticulo(index)"></span>

								<span class="glyphicon glyphicon-minus btn btn-xs btn-warning" @click="menosArticulo(index)"></span>-->

								<span class="button button-primary" @click="eliminarArticulo(index)">X</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="six columns">
				<table class="u-full-width">
					<tr>
						<th width="25%" class="ben">TOTAL :</th>
						<td><h2 style="color: green">$ @{{total}}</h2></td>
					</tr>

					<tr>
						<th class="ben">PAGA CON : </th>
						<td><h2><input type="number" class="u-full-width" v-model="pago" min="0"></h2></td>
					</tr>

					<tr>
						<th class="ben">CAMBIO DE : </th>
						<td><h2 style="color: lightgreen">$ @{{cambio}}</h2></td>
					</tr>
				</table>

				<!--@{{cantidades}}-->
			</div>
		</div>
	</div>
	
</div>

@endsection

@push('scripts')
	<script src="js/vue-resource.js"></script>
	<script src="js/rentas/rentas.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
@endpush