@extends('template')
@section('content')
    <div style="margin-top:2rem" class="container">
        <h2>Alta de Usuarios</h2>
        @if ($errors->any())
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                <strong>¡Revise que los campos!</strong>
                @foreach ($errors->all() as $error)
                    <span class="badge badge-danger">{{ $error }}</span>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                    <span arial-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    {!! Form::text('name', null , ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    {!! Form::text('email', null , ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="confirm-password"> Confirmar Password</label>
                    {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for=""> Roles </label>
                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}
                </div>
            </div>


            <div style="margin-top: 3rem" class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>



        </div>

        {!! Form::close() !!}
    </div>
@endsection
