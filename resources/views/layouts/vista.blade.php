<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width"></meta>
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta name="route" value="{{url('login')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>

    <!-- Bootstrap -->
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
  <link rel="stylesheet" type="text/css" href="css/color.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="adminlte/css/font-awesome/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="adminlte/css/Ionicons/css/ionicons.min.css"> -->
  
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="adminlte/css/AdminLTE.min.css"> -->
  
  <!-- <link rel="stylesheet" href="adminlte/css/skins/skin-green.min.css"> -->
  <link rel="stylesheet" type="text/css" href="css/skeleton.css">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/fuentes.css">
  
  <script type="text/javascript" src="js/vue.js"></script>

  </head>
  <body class="hold-transition login-page">
    
   <!--este comando se utiliza para cargar todo tipo de archivo de html-->
    @yield('contenido')
    


    <!--este comando se utiliza para cargar todo tipo de archivo de js-->
    @stack('scripts')

    <!--<script src="js/bootstrap.min.js"></script>-->
  </body>
</html>