@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
    </div>

    @if (Session::has('deleted_post'))
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <p class="alert alert-danger"><i class="fas fa-info-circle mr-3"></i>{{session('deleted_post')}}</p>
        </div>
    @endif

    @if (Session::has('updated_post'))
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <p class="alert alert-info"><i class="fas fa-info-circle mr-3"></i>{{session('updated_post')}}</p>
        </div>
    @endif

    @if (Session::has('created_post'))
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <p class="alert alert-success"><i class="fas fa-info-circle mr-3"></i>{{session('created_post')}}</p>
        </div>
    @endif


    <div class="row">
            <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <h5 class="mb-4">Data Posts</h5>
                            <div class="mb-3">
                                <a href="{{route('admin.posts.create')}}" class="btn btn-success">Tambah
                                    Post</a>
                            </div>
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Id Post</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Created</th> 
                                        <th scope="col">Updated</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                

                                  
                                    @foreach ($posts as $post)
                                    <tr>
                                    <td>{{ $post->id }}</td>                                    
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->name}}</td>
                                    <td>
                                        <img width="200" src="{{ $post->photo->file }}" alt="images" class="img-thumbnail">
                                    </td>
                                    <td>{{ $post->title}}</td>
                                    <td>{{ $post->body}}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{route('admin.posts.edit', $post->id)}}"><i class="fas fa-edit"></i></a>
                                        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy', $post->id]]) !!}
                                        {!! Form::button('<i class="fas fa-trash text-danger"></i>', ['type'=>'submit','class'=>'btn']) !!}

                                        {!! Form::close() !!}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
@endsection
