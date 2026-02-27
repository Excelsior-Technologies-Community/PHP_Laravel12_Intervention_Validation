@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Users List</h4>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
                </div>
            </div>

            <div class="card-body">
                <!-- Search Form -->
                <form action="{{ route('users.search') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="Search by name or email..." 
                               value="{{ $search ?? '' }}">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>

                <!-- Users Table -->
                @if($users->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('users.show', $user) }}" 
                                               class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('users.edit', $user) }}" 
                                               class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('users.destroy', $user) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                @else
                    <div class="alert alert-info">
                        No users found. 
                        <a href="{{ route('users.create') }}">Create your first user!</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection