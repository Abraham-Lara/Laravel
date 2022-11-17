@extends('template')
@section('content')

<div class="container">
    <h2> Chats </h2>
    <hr class="border border-success border-2 opacity-50">
    <table class="table table-success table-striped">
        
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Mensaje</th>
            <th scope="col">Para Servicio:</th>
            <th scope="col">Remitente:</th>
            <th scope="col">Fecha</th>
        </tr>        

</div>

@forelse( $mensajeR as $item)
<tr>
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->mensaje}}</td>
        <td>{{$item->titulo}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->created_at->format('d-yy h:i')}}</td>
    </tr>
   


</tr>
    
@empty
<h4 style="color: red">¡Aun nadie te ha contactado!</h4>
 </table>    
@endforelse 

    
@endsection