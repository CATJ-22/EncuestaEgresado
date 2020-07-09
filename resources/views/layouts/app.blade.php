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
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">     
</head>
<!-- UTP HEADER -->
<header style="background-image: url(../imagenes/headerutp.jpg); background-repeat: no-repeat; background-size: cover; padding: 8.3%; ">
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
    <img src="../icons/home.svg" alt="home SVG">
      <a class="nav-item nav-link" href="#">INICIO</a>
      <img src="../icons/file.svg" alt="file SVG">
      <a class="nav-item nav-link" href="#">ENCUESTAS</a>
      <img src="../icons/book-open.svg" alt="book SVG">
      <a class="nav-item nav-link" href="#" style="position:right;">GENERAR REPORTES</a>
    </div>
  </div>
</nav>
<body>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>