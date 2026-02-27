@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>User Details</h4>
                <div>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">ID:</div>
                    <div class="col-md-8">{{ $user->id }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Name:</div>
                    <div class="col-md-8">{{ $user->name }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Email:</div>
                    <div class="col-md-8">{{ $user->email }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Phone:</div>
                    <div class="col-md-8">{{ $user->phone ?? 'Not provided' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Age:</div>
                    <div class="col-md-8">{{ $user->age }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Bio:</div>
                    <div class="col-md-8">
                        {{ $user->bio ?? 'No bio provided' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Created At:</div>
                    <div class="col-md-8">{{ $user->created_at->format('F j, Y, g:i a') }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">Last Updated:</div>
                    <div class="col-md-8">{{ $user->updated_at->format('F j, Y, g:i a') }}</div>
                </div>
            </div>

            <div class="card-footer">
                <form action="{{ route('users.destroy', $user) }}" 
                      method="POST" 
                      class="d-inline"
                      onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete User</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection