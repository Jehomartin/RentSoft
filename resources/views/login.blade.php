@extends('layouts.vista')
@section('titulo','Login')
@section('contenido')
<!-- <link rel="stylesheet" type="text/css" href="css/style.css">  -->

<div class="container">
  <div class="row bord">

    <div class="five columns">
      <center>
        <br><br>
        <img src="img/logo/logo.png" width="350" height="350">
      </center>
    </div>

    <div class="seven columns ">
      <center>
        <br><br> 
        <h1 class="titlo">Inicie Sesión</h1>
        <form action="{{url('entrar')}}" method="POST">
          @csrf

          <p class="log">Usuario</p>
          <input type="text" name="usuario" placeholder="Ingrese su Usuario" class="u-full-width">
          <br><br>
          <p class="log">Contraseña</p>
          <input type="password" name="pass" placeholder="Ingrese su Contraseña" class="u-full-width">
          <br><br>
          <input type="submit" name="submit" value="Ingresar" class=" button button-primary u-full-width">
          
          <center><a href="{{url('registro')}}"><input type="button" value="Registrarse" class="button button-primary u-full-width"></a></center><br>   
        </form> 
      </center>
    </div>
  </div>
</div>
@endsection