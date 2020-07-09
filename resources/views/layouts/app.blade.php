<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel ="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<!-- UTP HEADER -->
<header>
<img src="{{asset ('imagenes/headerutp.jpg')}}" class="utpheader" style="vertical-align:middle;">
</header>
<!--NAV NAME -->
<nav class="navbar navbar-light" style="background-color:#005B28;">
  <!-- Navbar content -->
  <a class="navbar-brand" style="color: #fff" href="#"> SECRETARIA DE LA VICEDECANA ACADEMICA </a>
</nav>
   <!-- NAV PRINCIPAL -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#"><i class="fas fa-home"></i>INICIO</a>
      <a class="nav-item nav-link" href="#">ENCUESTAS</a>
      <a class="nav-item nav-link" href="#">GENERAR</a>
    </div>
  </div>
</nav>
<body>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>