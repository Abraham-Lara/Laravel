<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel')</title>

    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js defer"></script>
</head>
<body>


    <nav class=" navbar navbar-expand-lg navbar-light bg-light">
       <div class="container-fluid"> 

        <div class="navbas-nav">
        
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="/img/airplane-engines.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Empresa Virtual
          </a>
    
        @guest
        
        <a class="navbar-brand" href="{{route('login')}}">Login</a>

         @else
         <a class="navbar-brand" href="{{route('blog')}}">Servicios</a>
         <a class="navbar-brand" href="{{route('mi-servicios')}}">Mis Servicios</a>
         <a class="navbar-brand" href="{{route('chat')}}">Mensaje</a>
         <a class="navbar-brand" href="{{route('chatRec')}}">Mensajes Recibidos</a>
         <button style="margin-left:400px " class="btn btn-outline-danger"><a class="navbar-brand" href="#" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Cerrar Sesión</a></button>
     @endguest

    </div>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
     @csrf
 </form>
</div>
    </nav>
      

    </p>
    <hr>

@yield('content')
</html>