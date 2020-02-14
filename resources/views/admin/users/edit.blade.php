@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <div class="row">
            <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <h5 class="mb-4">Update User</h5>
                            <div class="row">
                                    <div class="col-lg-3">
                                            <img width="200" src="{{ $user->photo ? $user->photo->file : 'https://via.placeholder.com/200' }}" alt="pp" class="img-profile img-thumbnail mb-2 ">
                                    </div>

                                    <div class="col-lg-9">
                                            {!! Form::model($user, ['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id],'files'=> true]) !!}
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
                                                    {!! Form::label('Photo', 'Photo', ['class'=>'d-block ml-1']) !!}
                                                    {!! Form::file('photo_id', ['class'=>'form-control-file ml-1']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('Password','Password') !!}
                                                {!! Form::password('password', ['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                                .{!! Form::submit('Update User', ['class'=>'btn btn-success']) !!}
                                            </div>
                                            {!! Form::close() !!}
                                            @if (count($errors) > 0)
                                            @include('includes.errors')
                                                
                                            @endif
                                    </div>
                            </div>

                            

                        </div>
                    </div>
                </div>
    </div>
@endsection
