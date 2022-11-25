@extends('template')
@section('content')
    <div class="container">
        <h2> Servicios Disponibles</h2>
        <hr class="border border-success border-2 opacity-50">

      
        <div class="container" style="margin-bottom: 2rem">
            @can('crear-blog')
            <a class="btn btn-warning" href="{{ route('create') }}">Nuevo</a>
            @endcan
        </div>
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
                @can('ver-blog')
                    <a class="btn btn-primary" href="{{ route('post', $item->enlace) }}">Ver</a>
                @endcan

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

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
@endsection
