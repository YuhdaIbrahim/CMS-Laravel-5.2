@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    @if (Session::has('deleted_user'))
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <p class="alert alert-danger"><i class="fas fa-info-circle mr-3"></i>{{session('deleted_user')}}</p>
        </div>
    @endif

    @if (Session::has('updated_user'))
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <p class="alert alert-info"><i class="fas fa-info-circle mr-3"></i>{{session('updated_user')}}</p>
        </div>
    @endif

    @if (Session::has('created_user'))
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <p class="alert alert-success"><i class="fas fa-info-circle mr-3"></i>{{session('created_user')}}</p>
        </div>
    @endif


    <div class="row">
            <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <h5 class="mb-4">Data Users</h5>
                            <div class="mb-3">
                                <a href="{{route('admin.users.create')}}" class="btn btn-success">Tambah
                                    User</a>
                            </div>
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Id User</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Created</th> 
                                        <th scope="col">Updated</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if ($users)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td><img height="50" src="{{ $user->photo ? $user->photo->file : 'https://via.placeholder.com/50' }}" alt=""></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>{{ $user->is_active == 1 ? 'Active' : 'Offline' }}</td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{route('admin.users.edit', $user->id)}}"><i class="fas fa-edit"></i></a>
                                                {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id]]) !!}
                                                {!! Form::button('<i class="fas fa-trash text-danger"></i>', ['type'=>'submit','class'=>'btn']) !!}

                                                {!! Form::close() !!}
                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>
@endsection
