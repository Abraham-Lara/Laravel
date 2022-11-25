@extends('template')
@section('content')
    <div class="container">

        <h3> Crear nuevo servicio</h3>
      
            <form method="POST" action="{{ route('crear-post') }}">
                @include('posts._form', ['btnText' => 'Crear'])
            </form>
        
    </div>
@endsection
