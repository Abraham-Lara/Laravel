@extends('template')
@section('content')
    <div style="margin-top:2rem" class="container">
        <h2>Editar Rol</h2>
        @if ($errors->any())
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                <strong>¡Revise los campos!</strong>
                @foreach ($errors->all() as $error)
                    <span class="badge bg-warning text-dark">{{ $error }}</span>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Nombre del Rol</label>
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Permisos para este Rol</label>
                    <br>

                    @foreach ($permission as $item)
                        <label>{{ Form::checkbox('permission[]', $item->id, in_array($item->id, $rolePermission) ?  true : false, ['class' => 'name']) }}
                            {{ $item->name }}</label>
                        <br>
                    @endforeach

                </div>
            </div>


            <div style="margin-top: 3rem" class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>



        </div>

        {!! Form::close() !!}
    </div>
@endsection
