@extends('template')
@section('content')

<div class="container">
    <h2> Chats </h2>
    <hr class="border border-success border-2 opacity-50">
    <table class="table table-success table-striped">
        
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Mensaje</th>
            <th scope="col">Titulo de Servicio</th>
            <th scope="col">Autor del Servicio</th>
            <th scope="col">Fecha</th>
           
        </tr>        

</div>


@forelse ($mensaajes as $item)

<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->mensaje}}</td>
    <td>{{$item->titulo}}</td>
    <td>{{$item->users->name}}</td>
    <td>{{$item->created_at->format('d-yy h:i')}}</td>
    
</tr>

@empty
    <h5 style="color: red">¡Aun no has tienes chat!</h5>
@endforelse 

</table>    
@endsection