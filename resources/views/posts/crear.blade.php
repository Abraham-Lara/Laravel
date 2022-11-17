@extends('template')
@section('content')

    <h1> Crear nuevo servicio</h1>

<form method="POST" action="{{route('crear-post')}}">
   @include('posts._form',  ['btnText' => 'Crear'])
</form>
   
@endsection