<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>{{ $user->name }} - User Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
            color: #1f2937;
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Arial,
                sans-serif;
        }

        .page-wrapper {
            max-width: 1100px;
            margin: auto;
        }

        /* Header */

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 14px;
        }

        .btn-primary {
            background: #4f46e5;
            border-color: #4f46e5;
        }

        .btn-primary:hover {
            background: #4338ca;
            border-color: #4338ca;
        }

        /* Main Card */

        .profile-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            box-shadow:
                0 4px 12px rgba(15, 23, 42, 0.05);
        }

        /* Profile Header */

        .profile-header {
            padding: 30px;
            background: #ffffff;
            border-bottom: 1px solid #eef0f4;
        }

        .user-avatar-large {
            width: 78px;
            height: 78px;
            border-radius: 50%;
            background: #eef2ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .user-name {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
        }

        .user-email {
            color: #6b7280;
            font-size: 14px;
        }

        .user-id-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            border-radius: 20px;
            background: #f1f5f9;
            color: #475569;
            font-size: 12px;
            font-weight: 600;
        }

        /* Information */

        .details-body {
            padding: 30px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 650;
            color: #111827;
            margin-bottom: 20px;
        }

        .info-box {
            border: 1px solid #e5e7eb;
            border-radius: 11px;
            padding: 17px;
            height: 100%;
            background: #ffffff;
            transition: 0.2s ease;
        }

        .info-box:hover {
            border-color: #c7d2fe;
            background: #fafaff;
        }

        .info-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;
            background: #eef2ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .info-label {
            color: #6b7280;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 4px;
        }

        .info-value {
            color: #111827;
            font-size: 15px;
            font-weight: 600;
            word-break: break-word;
        }

        /* Age */

        .age-badge {
            display: inline-block;
            padding: 6px 12px;
            background: #ecfdf5;
            color: #047857;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* Bio */

        .bio-box {
            border: 1px solid #e5e7eb;
            border-radius: 11px;
            background: #f8fafc;
            padding: 20px;
            color: #475569;
            line-height: 1.7;
            min-height: 100px;
        }

        /* Footer */

        .card-footer-custom {
            padding: 20px 30px;
            border-top: 1px solid #eef0f4;
            background: #ffffff;
        }

        .danger-zone {
            border: 1px solid #fecaca;
            background: #fef2f2;
            border-radius: 10px;
            padding: 15px;
        }

        .danger-title {
            color: #991b1b;
            font-size: 14px;
            font-weight: 600;
        }

        .danger-text {
            color: #b91c1c;
            font-size: 12px;
        }

        /* Responsive */

        @media (max-width: 768px) {

            .page-title {
                font-size: 23px;
            }

            .header-actions {
                width: 100%;
                margin-top: 15px;
            }

            .header-actions a {
                width: 100%;
            }

            .profile-header {
                padding: 22px;
            }

            .details-body {
                padding: 22px;
            }

            .card-footer-custom {
                padding: 18px 22px;
            }

        }
    </style>

</head>

<body>

    <div class="container-fluid py-4">

        <div class="page-wrapper">

            {{-- ========================================= --}}
            {{-- PAGE HEADER --}}
            {{-- ========================================= --}}

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                <div>

                    <div class="d-flex align-items-center gap-2 mb-1">

                        <i
                            class="bi bi-person-vcard text-primary fs-3">
                        </i>

                        <h1 class="page-title mb-0">
                            User Details
                        </h1>

                    </div>

                    <div class="page-subtitle">

                        View complete information about this user

                    </div>

                </div>


                <div class="header-actions">

                    <a
                        href="{{ route('users.index') }}"
                        class="btn btn-light border px-4">

                        <i class="bi bi-arrow-left me-1"></i>

                        Back to Users

                    </a>

                </div>

            </div>


            {{-- ========================================= --}}
            {{-- USER PROFILE CARD --}}
            {{-- ========================================= --}}

            <div class="profile-card">


                {{-- ========================================= --}}
                {{-- PROFILE HEADER --}}
                {{-- ========================================= --}}

                <div class="profile-header">

                    <div class="d-flex align-items-center gap-3">

                        {{-- Avatar --}}

                        <div class="user-avatar-large">

                            {{ strtoupper(substr($user->name, 0, 1)) }}

                        </div>


                        {{-- Name --}}

                        <div>

                            <div class="user-name">

                                {{ $user->name }}

                            </div>

                            <div class="user-email mb-2">

                                <i class="bi bi-envelope me-1"></i>

                                {{ $user->email }}

                            </div>

                            <span class="user-id-badge">

                                <i class="bi bi-hash"></i>

                                User ID {{ $user->id }}

                            </span>

                        </div>

                    </div>

                </div>


                {{-- ========================================= --}}
                {{-- USER INFORMATION --}}
                {{-- ========================================= --}}

                <div class="details-body">

                    <div class="section-title">

                        <i class="bi bi-person-lines-fill text-primary me-2"></i>

                        Personal Information

                    </div>


                    <div class="row g-3">


                        {{-- User ID --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="info-icon">

                                        <i class="bi bi-hash"></i>

                                    </div>

                                    <div>

                                        <div class="info-label">
                                            User ID
                                        </div>

                                        <div class="info-value">

                                            #{{ $user->id }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Name --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="info-icon">

                                        <i class="bi bi-person"></i>

                                    </div>

                                    <div>

                                        <div class="info-label">
                                            Full Name
                                        </div>

                                        <div class="info-value">

                                            {{ $user->name }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Email --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="info-icon">

                                        <i class="bi bi-envelope"></i>

                                    </div>

                                    <div>

                                        <div class="info-label">
                                            Email Address
                                        </div>

                                        <div class="info-value">

                                            {{ $user->email }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Phone --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="info-icon">

                                        <i class="bi bi-telephone"></i>

                                    </div>

                                    <div>

                                        <div class="info-label">
                                            Phone Number
                                        </div>

                                        <div class="info-value">

                                            {{ $user->phone ?? 'Not provided' }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Age --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="info-icon">

                                        <i class="bi bi-calendar-heart"></i>

                                    </div>

                                    <div>

                                        <div class="info-label">
                                            Age
                                        </div>

                                        <div class="info-value">

                                            <span class="age-badge">

                                                {{ $user->age }} years old

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Registered Date --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="info-icon">

                                        <i class="bi bi-calendar3"></i>

                                    </div>

                                    <div>

                                        <div class="info-label">
                                            Registered On
                                        </div>

                                        <div class="info-value">

                                            {{ $user->created_at->format('d M Y, h:i A') }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Updated Date --}}

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="d-flex align-items-center gap-3">

                                    <div class="info-icon">

                                        <i class="bi bi-clock-history"></i>

                                    </div>

                                    <div>

                                        <div class="info-label">
                                            Last Updated
                                        </div>

                                        <div class="info-value">

                                            {{ $user->updated_at->format('d M Y, h:i A') }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>


                    </div>


                    {{-- ========================================= --}}
                    {{-- BIO --}}
                    {{-- ========================================= --}}

                    <div class="section-title mt-4">

                        <i class="bi bi-card-text text-primary me-2"></i>

                        About User

                    </div>


                    <div class="bio-box">

                        @if($user->bio)

                        {{ $user->bio }}

                        @else

                        <span class="text-muted">

                            No bio information has been provided.

                        </span>

                        @endif

                    </div>

                </div>


                {{-- ========================================= --}}
                {{-- FOOTER / DELETE --}}
                {{-- ========================================= --}}

                <div class="card-footer-custom">

                    <div class="danger-zone">

                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                            <div>

                                <div class="danger-title">

                                    <i class="bi bi-exclamation-triangle me-1"></i>

                                    Delete User

                                </div>

                                <div class="danger-text mt-1">

                                    This action cannot be undone.

                                </div>

                            </div>


                            <form
                                method="POST"
                                action="{{ route('users.destroy', $user) }}"
                                onsubmit="return confirm('Are you sure you want to permanently delete {{ $user->name }}?');">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger">

                                    <i class="bi bi-trash me-1"></i>

                                    Delete User

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>