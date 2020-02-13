@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>

    <div class="row">
            <div class="col-xl-12 col-lg-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <h5 class="mb-4">Data Users</h5>
                            <div class="mb-3">
                                <a href="users.php?source=add_user" class="btn btn-success">Tambah
                                    User</a>
                            </div>
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">Id User</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Created</th> 
                                        <th scope="col">Updated</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if ($users)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>{{ $user->is_active == 1 ? 'Active' : 'Offline' }}</td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                            <td>{{ $user->updated_at->diffForHumans() }}</td>
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
