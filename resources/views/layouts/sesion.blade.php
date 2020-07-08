<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('content')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel ="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
      
</head>
<body style="background: transparent;">
<img src="{{asset ('imagenes/fisc.png')}}" class="imglg1">
<div class="sidenav">
   <img src="{{asset ('imagenes/utplogo.png')}}" class="imglg">
</div>
      <div class="main">
         <div class="col-md-6 col-sm-12" >
            <div class="login-form">
               <form>
               <h2>INICIO DE SESIÓN</h2>
                  <div class="form-group">
                     <label>Cédula</label>
                     <input type="text" class="form-control" placeholder="Ingrese su cédula">
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" class="form-control" placeholder="************">
                  </div>
                  <button type="submit" class="btn btn-black">Acceder</button>
               </form>
            </div>
         </div>
      </div>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
