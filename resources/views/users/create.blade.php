@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Create New User</h4>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" 
                               class="form-control @error('phone') is-invalid @enderror" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}"
                               placeholder="e.g., 1234567890">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">10-15 digits, numbers only (optional)</div>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control @error('age') is-invalid @enderror" 
                               id="age" 
                               name="age" 
                               value="{{ old('age') }}" 
                               min="18" 
                               max="100" 
                               required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Must be between 18 and 100</div>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" 
                                  id="bio" 
                                  name="bio" 
                                  rows="3"
                                  placeholder="Tell us about yourself...">{{ old('bio') }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Maximum 500 characters (optional)</div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Create User</button>
                        <button type="reset" class="btn btn-secondary">Reset Form</button>
                    </div>
                </form>
            </div>

            <!-- Validation Rules Summary -->
            <div class="card-footer">
                <h6>Validation Rules:</h6>
                <ul class="small mb-0">
                    <li><strong>Name:</strong> Required, 2-255 characters</li>
                    <li><strong>Email:</strong> Required, valid format, must be unique</li>
                    <li><strong>Phone:</strong> Optional, 10-15 digits only</li>
                    <li><strong>Age:</strong> Required, 18-100 years</li>
                    <li><strong>Bio:</strong> Optional, max 500 characters</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection