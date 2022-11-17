@extends('template')
@section('content')

<div style="margin-left:150px; margin-right:150px; margin-bottom:10px">
<h1>Chat</h1>  
@forelse ($mensajes as $message)
<div style="margin-left:150px; margin-right:150px; margin-bottom:10px">

  
   <p> {{$message->mensaje}} </p>
  
   <br>
   <p style="float: right;"> {{$message->created_at->format('h:i')}}</p>
   <br>
   <hr class="border border-success border-2 opacity-50">
</div>  



@empty
<h4 style="color:darkblue">¡Comienza a Escribir!</h4>
    
@endforelse
@include('salas._form-chat')

</div>  

@endsection