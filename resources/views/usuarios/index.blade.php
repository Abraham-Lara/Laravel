@extends('template')
@section('content')
    <div class="container">
        <h2>Usuarios</h2>
        <hr class="border border-success border-2 opacity-50">
        @include('partials.sessions-error')
        <button class="btn btn-success">
            <a style="text-decoration: none; color:aliceblue" href="{{ route('usuarios.create') }}">Nuevo</a>
        </button>
        <div style="margin-top: 2rem" class="container">
            <table class="table table-striped">

                <tr>
                    <th scope="col" style="display:none">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
        </div>

        @foreach ($usuarios as $item)
            <tr>
                <td style="display: none;">{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    @if (!empty($item->getRoleNames()))
                        @foreach ($item->getRoleNames() as $rolName)
                            <h5><span class="badge bg-dark">{{ $rolName }}</span></h5>
                        @endforeach
                    @endif
                </td>
                <td>

                    <a class="btn btn-info" href="{{ route('usuarios.edit', $item->id) }}">Editar</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $item->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </table>
    </div>
    <div class="d-flex justify-content-end">
        {{ $usuarios->links() }}
    </div>
@endsection
