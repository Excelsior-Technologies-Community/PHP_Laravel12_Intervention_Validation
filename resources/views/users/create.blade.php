<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Create User</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2>
                    Create User
                </h2>

                <p class="text-muted mb-0">
                    Add a new user
                </p>

            </div>

            <a
                href="{{ route('users.index') }}"
                class="btn btn-secondary">
                ← Users
            </a>

        </div>


        @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Please fix these errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

                @endforeach

            </ul>

        </div>

        @endif


        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                <form
                    method="POST"
                    action="{{ route('users.store') }}">

                    @csrf


                    {{-- Name --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Name *
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter full name">

                        @error('name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror

                    </div>


                    {{-- Email --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Email *
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="example@gmail.com">

                        @error('email')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror

                    </div>


                    {{-- Phone --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Enter phone number">

                        @error('phone')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror

                    </div>


                    {{-- Age --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Age *
                        </label>

                        <input
                            type="number"
                            name="age"
                            value="{{ old('age') }}"
                            min="18"
                            max="100"
                            class="form-control @error('age') is-invalid @enderror"
                            placeholder="18 - 100">

                        @error('age')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror

                    </div>


                    {{-- Bio --}}

                    <div class="mb-3">

                        <label class="form-label">
                            Bio
                        </label>

                        <textarea
                            name="bio"
                            rows="4"
                            class="form-control @error('bio') is-invalid @enderror"
                            placeholder="Enter user bio">{{ old('bio') }}</textarea>

                        @error('bio')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                        @enderror

                    </div>


                    <div class="d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary">
                            Create User
                        </button>

                        <a
                            href="{{ route('users.index') }}"
                            class="btn btn-secondary">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>