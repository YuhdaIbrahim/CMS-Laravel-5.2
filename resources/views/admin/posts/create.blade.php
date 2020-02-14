@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
    </div>

    <div class="row">
            <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <h5 class="mb-4">Create Post</h5>
                            {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=> true]) !!}
                            <div class="form-group">
                                {!! Form::label('title','Title') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('category_id','Category') !!}
                                {!! Form::select('category_id', $Categories, null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('body','Content') !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('file','Photo') !!}
                                    {!! Form::file('photo_id', ['class'=>'form-control-file']) !!}
                            </div>
                            <div class="form-group">
                                .{!! Form::submit('Create Post', ['class'=>'btn btn-success']) !!}
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
