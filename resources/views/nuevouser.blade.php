@extends('layouts.vista')
@section('titulo','Registro')
@section('contenido')
<link rel="stylesheet" type="text/css" href="css/formulario.css">

<div id="clientes">


		<h1 class="text text-center abc">Bienvenidos al Registro</h1>

	<div class="container">

		<a href="{{url('login')}}">
			<button class="boton-3">Regresar</button>
		</a>
		<br><br>

		<div class="row">
			<div class="three columns"></div>
			<div class="six columns">
				<center>
					<table bgcolor="E0F17F" class="sombra">
						<tr bgcolor="#343560">

							<td bgcolor="" class="tabla-columna1">
								<h2>
								LLENA LOS DATOS
								</h2>
							</td>
						</tr>
						<tr>
							<td>
								<div class="cuadros-1">
									
									<input type="text" id="usuario" name="user" placeholder="Nombre de usuario*" class="input-48" style="margin-top: 15px" v-model="id_usuario" required>
									<input type="password" id="contracenia" name="password" placeholder="Contraseña*" class="input-48" v-model="contrasenia" required>
									<input type="text" id="nombre" name="nombre" placeholder="Nombre*" class="input-48" v-model="nombre" required>
									<input type="text" id="apellidos" name="apellidos" placeholder="Apellidos*" class="input-48" v-model="apellidos" required>
									
									<input type="text" id="telefono" name="telefono" placeholder="Teléfono*" class="input-48" v-model="telefono" maxlength="10">
									
									<input type="text" id="direccion" name="direccion" placeholder="Dirección*" class="input-48" v-model="direccion">
									<input type="text" id="localidad" name="localidad" placeholder="Localidad*" class="input-48" v-model="localidad">
									
									
									<a>
										<button class="boton-1" @click="guardarUser(event)">Registrar</button>
									</a>
									
									<a href="{{url('login')}}">
									<button class="boton-2">Cancelar</button></a>
								</div>
							</td>
						</tr>
					</table>
				</center>
			</div>
			<dir class="three columns"></dir>
		</div>
	</div>
</div>

@endsection

@push('scripts')
	<script src="js/administracion/clientes.js"></script>
	<script src="js/vue-resource.js"></script>
@endpush