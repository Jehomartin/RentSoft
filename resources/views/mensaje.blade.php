@extends('layouts.vista')
@section('titulo','Mensaje')
@section('contenido')
<link rel="stylesheet" type="text/css" href="css/bienvenida.css">
<br><br><br>
<div class="container">
	<div class="row fondo">
		<font color="white" face="arial black">
			<h1 align="center">
				AVISO DE SISTEMA. USUARIO Y/O CONTRASEÑA INCORRECTO(S)!!.<br><br>
				POR FAVOR VUELVA A COLOCAR SUS DATOS DE MANERA CORRECTA!!
			</h1>
		</font>
		<br>
		<center>
			<a href="{{url('login')}}">
				<input type="button" value="NUEVO INTENTO" align="center">
			</a>
		</center>
		<br><br><br>
	</div>
</div>

@endsection