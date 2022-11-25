@extends('template')
@section('content')
    <div style="margin-top:2rem" class="container">
        <h2>Alta Rol</h2>
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

        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Nombre del Rol</label>
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Permisos para este Rol</label>
                        <br>

                        @foreach ($permission as $item)
                            <label>{{ Form::checkbox('permission[]', $item->id, false, ['class' => 'name']) }}
                                {{ $item->name }}</label>
                            <br>
                        @endforeach
                      
                    </div>
                </div>
                <button style="margin-top: 2rem" type="submit" class="btn btn-primary">Guardar</button>


                {!! Form::close() !!}
            </div>
        @endsection
