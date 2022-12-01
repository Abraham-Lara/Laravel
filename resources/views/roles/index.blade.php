@extends('template')
@section('content')
    <div class="container">
        <h2>Usuarios</h2>
        <hr class="border border-success border-2 opacity-50">
        @include('partials.sessions-error')

        @can('crear-rol')
            <a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>
        @endcan

        <div style="margin-top: 2rem" class="container">
            <table class="table table-striped">

                <tr>
                    <th scope="col" style="display:none">ID</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
        </div>

        @foreach ($roles as $item)
            <tr>
                <td style="display: none;">{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    @can('editar-rol')
                        <a class="btn btn-primary" href="{{ route('roles.edit', $item->id) }}">Editar</a>
                    @endcan

                    @can('borrar-rol')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $item->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>


            </tr>
        @endforeach
        </table>


    </div>
@endsection
