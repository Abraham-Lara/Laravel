<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js defer"></script>

</head>
<body>
<div>
   
          <form method="POST" action="{{route('sendMessage',$post)}}" class="d-flex" >
            @csrf
            <input name="mensaje" type="text" placeholder="Escribe tu mensaje" class="form-control">
          
            <button classs="btn btn-primary" id="btnChat">Enviar</button>
          </form>
    
    </div>
    
</html>
