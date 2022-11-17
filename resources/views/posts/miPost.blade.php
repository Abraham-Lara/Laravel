@extends('template')
@section('content')



<div class="container">
<h2>Detalle Servicio</h2>
<div class="row">

       @auth
           
       
        <div class="col">
            <button class="btn btn-info" ><a style="text-decoration: none; color:azure;" href="{{route('editar', $post->enlace)}}">Editar</a></button>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
            <form method="POST" action="{{route('eliminar', $post)}}">
                @csrf @method('DELETE')
            <button class="btn btn-danger" >Eliminar</button>
        </div>      
    @endauth
    
</div>


</form>
<hr class="border border-success border-2 opacity-50">

<input class="form-control" type="text" value="{{$post->titulo}}" aria-label="Disabled input example" disabled readonly>
<input class="form-control" value="" placeholder="{{$post->user->name}}" aria-label="Disabled input example" disabled>
<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" disabled readonly> {{$post->cuerpo}}</textarea>

</div>


<br>
<br>
@endsection
