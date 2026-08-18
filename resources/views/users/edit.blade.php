@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h4 class="mb-0">Edit User</h4>

                <a href="{{ route('users.index') }}"
                   class="btn btn-secondary">
                    Back to List
                </a>

            </div>

            <div class="card-body">

                <form method="POST"
                      action="{{ route('users.update', $user) }}">

                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-3">

                        <label for="name" class="form-label">
                            Name <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               required>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Email --}}
                    <div class="mb-3">

                        <label for="email" class="form-label">
                            Email <span class="text-danger">*</span>
                        </label>

                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               required>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Password --}}
                    <div class="mb-3">

                        <label for="password" class="form-label">
                            New Password
                        </label>

                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password"
                               name="password">

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-text">
                            Leave blank to keep the existing password.
                            If entered, it must contain at least 8 characters,
                            uppercase, lowercase, number and special character.
                        </div>

                    </div>

                    {{-- Password Confirmation --}}
                    <div class="mb-3">

                        <label for="password_confirmation" class="form-label">
                            Confirm New Password
                        </label>

                        <input type="password"
                               class="form-control"
                               id="password_confirmation"
                               name="password_confirmation">

                    </div>

                    {{-- Phone --}}
                    <div class="mb-3">

                        <label for="phone" class="form-label">
                            Phone
                        </label>

                        <input type="text"
                               class="form-control @error('phone') is-invalid @enderror"
                               id="phone"
                               name="phone"
                               value="{{ old('phone', $user->phone) }}"
                               placeholder="e.g., 1234567890">

                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-text">
                            10-15 digits, numbers only.
                        </div>

                    </div>

                    {{-- Age --}}
                    <div class="mb-3">

                        <label for="age" class="form-label">
                            Age <span class="text-danger">*</span>
                        </label>

                        <input type="number"
                               class="form-control @error('age') is-invalid @enderror"
                               id="age"
                               name="age"
                               value="{{ old('age', $user->age) }}"
                               min="18"
                               max="100"
                               required>

                        @error('age')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Employment Status --}}
                    <div class="mb-3">

                        <label for="employment_status" class="form-label">
                            Employment Status
                            <span class="text-danger">*</span>
                        </label>

                        <select name="employment_status"
                                id="employment_status"
                                class="form-select @error('employment_status') is-invalid @enderror"
                                required>

                            <option value="">
                                Select employment status
                            </option>

                            <option value="employed"
                                {{ old('employment_status', $user->employment_status) === 'employed' ? 'selected' : '' }}>
                                Employed
                            </option>

                            <option value="self-employed"
                                {{ old('employment_status', $user->employment_status) === 'self-employed' ? 'selected' : '' }}>
                                Self-employed
                            </option>

                            <option value="student"
                                {{ old('employment_status', $user->employment_status) === 'student' ? 'selected' : '' }}>
                                Student
                            </option>

                            <option value="unemployed"
                                {{ old('employment_status', $user->employment_status) === 'unemployed' ? 'selected' : '' }}>
                                Unemployed
                            </option>

                        </select>

                        @error('employment_status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Company Name --}}
                    <div class="mb-3">

                        <label for="company_name" class="form-label">
                            Company Name
                        </label>

                        <input type="text"
                               class="form-control @error('company_name') is-invalid @enderror"
                               id="company_name"
                               name="company_name"
                               value="{{ old('company_name', $user->company_name) }}"
                               placeholder="Enter company name">

                        @error('company_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-text">
                            Required for employed or self-employed users.
                        </div>

                    </div>

                    {{-- Bio --}}
                    <div class="mb-3">

                        <label for="bio" class="form-label">
                            Bio
                        </label>

                        <textarea class="form-control @error('bio') is-invalid @enderror"
                                  id="bio"
                                  name="bio"
                                  rows="3"
                                  placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>

                        @error('bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="d-grid gap-2">

                        <button type="submit"
                                class="btn btn-primary">
                            Update User
                        </button>

                        <a href="{{ route('users.index') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection