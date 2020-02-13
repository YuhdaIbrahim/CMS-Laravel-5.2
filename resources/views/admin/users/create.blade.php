@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <div class="row">
            <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <h5 class="mb-4">Create Users</h5>
                            {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=> true]) !!}
                            <div class="form-group">
                                {!! Form::label('file','Photo') !!}
                                {!! Form::file('photo_id', ['class'=>'form-control-file']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Name','Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Email','Email') !!}
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('is_active','Status') !!}
                                {!! Form::select('is_active', array(1 => 'Active',0 => 'InActive'), null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('role_id','Role') !!}
                                {!! Form::select('role_id',$roles, null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('Password','Password') !!}
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                .{!! Form::submit('Create User', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                            @if (count($errors) > 0)
                            @include('includes.errors')
                                
                            @endif
                        </div>
                    </div>
                </div>
    </div>
@endsection
