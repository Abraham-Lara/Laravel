@extends('template')
@section('content')
<div class="container">
    <h2> Actualizar servicio</h2>
    
<hr class="border border-success border-2 opacity-50">

<form method="POST" action="{{route('update-post', $post)}}">
    @method('PATCH')
   @include('posts._form',  ['btnText' => 'Actualizar'])
</form>
   </div>
@endsection