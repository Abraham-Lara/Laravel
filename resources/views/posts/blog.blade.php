@extends('template')
@section('content')


    

    <div class="container">
        <h2> Servicios Disponibles</h2>
        <hr class="border border-success border-2 opacity-50">
        <table class="table table-success table-striped">
            
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Accion</th>
            </tr>        

    </div>
   
    @foreach ($posts as $item)
    <tr>
            <td><strong>{{$item->id}}</td>
            <td>{{$item->titulo}}</td>
            <td>{{$item->user->name}}</td>
            <td><button class='btn btn-outline-primary'><a style="text-decoration:none; color:black" href="{{route('post', $item->enlace)}}">Ver</a></button></td>
      
    </tr>
        </table>
    @endforeach

    <div class="container" style="float:right; margin-botton:">
        
             @auth
    
                <button class="btn btn-success">
                    <a style="text-decoration: none; color:aliceblue" href="{{route('create')}}">Crear nuevo servicio</a> 
                </button>
   
             @endauth 
    </div>
@endsection