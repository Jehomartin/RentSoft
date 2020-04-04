<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="token" id="token" value="{{ csrf_token() }}">
  <meta name="route" value="{{url('login')}}">
  <title>@yield('titulo')</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="plant/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Custom fonts for this template -->
  
  <!-- Custom styles for this template -->
  <link href="plant/css/business-casual.min.css" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="css/color.css">
  <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
  <link rel="stylesheet" type="text/css" href="css/login.css">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/fuentes.css">

  <link rel="stylesheet" type="text/css" href="css/css1/css2.css">

  <script src="js/vue.js"></script>
  <script src="js/vue-resource.js"></script>

</head>

<body>

  <!-- <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">A Free Bootstrap 4 Business Theme</span>
    <span class="site-heading-lower">Business Casual</span>
  </h1> -->


   <div class="container">
      <div class="eigth columns"></div>
      <div class="four columns" style="text-align: right;">
        <img src="img/user/{{Session::get('foto')}}" class="img-circle" width="100" height="100">
        <p>
            {{Session::get('usuario')}} - {{Session::get('puesto')}}
        </p>
        <br>
        <a href="{{url('sale')}}" class="button button-primary">Cerrar Sesión</a>
      </div>
  </div>

  <!-- Navigation -->
  <div class="container div4">
    <div class="row">
     <!--  <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <div class="four columns">
         <li>
            <a href="{{url('inicio') }}"><font color="#009797" size="4" face="arial black">Inicio</font></a>
         </li>
      </div>
      <div class="four columns">
         <li>
            <a href="{{url('rentar') }}"><font color="#009797" size="4" face="arial black">Rentas</font></a>
         </li>
      </div>
      <div class="four columns">
         <li>
            <a href="{{url('devolver') }}"><font color="#009797" size="4" face="arial black">Devoluciones</font></a>
         </li>
      </div>
    </div>
  </div>
@yield('contenido')
  <!-- <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/intro.jpg" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper">Fresh Coffee</span>
            <span class="section-heading-lower">Worth Drinking</span>
          </h2>
          <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!
          </p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="#">Visit Us Today!</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Our Promise</span>
              <span class="section-heading-lower">To You</span>
            </h2>
            <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  @stack('scripts')
  <script src="plant/vendor/jquery/jquery.min.js"></script>
  

</body>

</html>
