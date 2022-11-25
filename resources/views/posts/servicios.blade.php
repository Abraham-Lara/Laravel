@extends('template')
@section('content')
    <div class="container">
        <h2> Servicios Publicados</h2>
        <hr class="border border-danger border-2 opacity-50">
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
            <td><strong>{{ $item->id }}</td>
            <td>{{ $item->titulo }}</td>
            <td>{{ $item->user->name }}</td>
            <td>
                @can('editar-blog')
                <a class="btn btn-primary" href="{{ route('editar', $item->enlace) }}">Editar</a>
                @endcan
                @can('borrar-blog')
                    
               
                {!! Form::open(['method' => 'DELETE', 'route' => ['eliminar', $item->enlace], 'style' => 'display:inline']) !!}
                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endcan
            </td>


        </tr>
    @endforeach
    </table>


    <div class="container" style="float:right; margin-botton:">

        @auth

            <button class="btn btn-success">
                <a style="text-decoration: none; color:aliceblue" href="{{ route('create') }}">Crear nuevo servicio</a>
            </button>

        @endauth


    </div>
@endsection
