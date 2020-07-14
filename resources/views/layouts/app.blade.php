<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script url="js/app.js" defer></script>
    @yield('scripts')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel ="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Styles -->
    <style>
    .anav{
    color: black;
    font-family: "Pill Gothic 600mg Semibd", sans-serif;
    }
    </style>
    @yield('styles')
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

<nav class="navbar navbar-expand-sm justify-content-center navbar-light" style="font-family: Pill Gothic 600mg Semibd; sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
  <ul class="navbar-nav">
    <li class="nav-item" >
      <a class="navbar-link anav" href="/modulos" ><img src="../icons/home.svg" alt="home SVG" >  INICIO</a>
    </li>
    <div Style="width: 50px;"></div>
    <li class="nav-item" >
      <a class="navbar-link anav" href="encuesta" ><img src="../icons/file.svg" alt="file SVG"> ENCUESTAS</a>
    </li>
    <div style="width: 50px;"></div>
    <li class="nav-item" >
      <a class="navbar-link anav" href="#reportes"><img src="../icons/book-open.svg" alt="book SVG">   GENERAR REPORTES</a>
    </li>
  </ul>
</nav>
@yield('content')
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <div class="d-flex flex-column mb-4 justify-content-center">
            <img src="imagenes/IMGWEB1.jpg" alt="" width="350">
            <img src="imagenes/IMGWEB.jpg" alt="" width="350" class="mt-2">
        </div>
      </div>
</body>

</html>