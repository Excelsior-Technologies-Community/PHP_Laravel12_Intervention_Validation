<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>User Management Dashboard</title>

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
            max-width: 1450px;
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

        /* Cards */

        .dashboard-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: #ffffff;
            box-shadow:
                0 2px 6px rgba(15, 23, 42, 0.04);
        }

        .stat-card {
            padding: 22px;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-bottom: 15px;
        }

        .stat-icon.blue {
            background: #eef2ff;
            color: #4f46e5;
        }

        .stat-icon.green {
            background: #ecfdf5;
            color: #059669;
        }

        .stat-icon.orange {
            background: #fff7ed;
            color: #ea580c;
        }

        .stat-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .stat-value {
            color: #111827;
            font-size: 28px;
            font-weight: 700;
        }

        /* Filter */

        .filter-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: #ffffff;
        }

        .filter-header {
            padding: 18px 22px;
            border-bottom: 1px solid #eef0f4;
        }

        .filter-title {
            font-size: 16px;
            font-weight: 600;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            min-height: 42px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
        }

        /* Table */

        .users-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            background: #ffffff;
            overflow: hidden;
        }

        .users-header {
            padding: 18px 22px;
            border-bottom: 1px solid #eef0f4;
        }

        .users-title {
            font-size: 17px;
            font-weight: 650;
            margin: 0;
        }

        .result-count {
            color: #6b7280;
            font-size: 13px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 14px 18px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 16px 18px;
            vertical-align: middle;
            color: #374151;
            font-size: 14px;
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr:hover {
            background: #fafbff;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #eef2ff;
            color: #4f46e5;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 10px;
        }

        .user-name {
            font-weight: 600;
            color: #111827;
        }

        .user-email {
            color: #6b7280;
            font-size: 13px;
        }

        .id-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 7px;
            background: #f1f5f9;
            color: #475569;
            font-size: 12px;
            font-weight: 600;
        }

        .age-badge {
            display: inline-block;
            padding: 5px 10px;
            background: #f0fdf4;
            color: #15803d;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .date-text {
            color: #64748b;
            white-space: nowrap;
        }

        /* Buttons */

        .action-btn {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            background: #ffffff;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .action-view {
            color: #4f46e5;
        }

        .action-view:hover {
            background: #eef2ff;
            border-color: #c7d2fe;
        }

        .action-delete {
            color: #dc2626;
        }

        .action-delete:hover {
            background: #fef2f2;
            border-color: #fecaca;
        }

        /* Pagination */

        .pagination-wrapper {
            padding: 18px 22px;
            border-top: 1px solid #eef0f4;
        }

        .pagination {
            margin-bottom: 0;
        }

        .page-link {
            color: #4f46e5;
            border-radius: 7px;
            margin: 0 2px;
            border: 1px solid #e5e7eb;
        }

        .page-item.active .page-link {
            background: #4f46e5;
            border-color: #4f46e5;
        }

        /* Empty */

        .empty-state {
            padding: 70px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 18px;
        }

        /* Alerts */

        .alert {
            border-radius: 10px;
            border: none;
        }

        /* Responsive */

        @media (max-width: 768px) {

            .page-title {
                font-size: 23px;
            }

            .header-actions {
                margin-top: 15px;
                width: 100%;
            }

            .header-actions .btn {
                width: 100%;
            }

            .users-header {
                padding: 15px;
            }

            .table thead th,
            .table tbody td {
                padding: 12px;
            }

        }
    </style>

</head>

<body>

    <div class="container-fluid py-4">

        <div class="page-wrapper">

            {{-- ========================================= --}}
            {{-- HEADER --}}
            {{-- ========================================= --}}

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                <div>

                    <div class="d-flex align-items-center gap-2 mb-1">

                        <div
                            class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                            style="width:42px;height:42px;background:#4f46e5 !important;">

                            <i class="bi bi-people-fill"></i>

                        </div>

                        <h1 class="page-title mb-0">
                            User Management
                        </h1>

                    </div>

                    <div class="page-subtitle ms-1">
                        Manage, search and monitor registered users
                    </div>

                </div>

                <div class="header-actions">

                    <a
                        href="{{ route('users.create') }}"
                        class="btn btn-primary px-4">

                        <i class="bi bi-person-plus me-1"></i>

                        Add User

                    </a>

                </div>

            </div>


            {{-- ========================================= --}}
            {{-- SUCCESS MESSAGE --}}
            {{-- ========================================= --}}

            @if(session('success'))

            <div
                class="alert alert-success alert-dismissible fade show shadow-sm mb-4"
                role="alert">

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

            @endif


            {{-- ========================================= --}}
            {{-- VALIDATION ERRORS --}}
            {{-- ========================================= --}}

            @if($errors->any())

            <div
                class="alert alert-danger shadow-sm mb-4">

                <div class="fw-semibold mb-2">

                    <i class="bi bi-exclamation-triangle-fill me-2"></i>

                    Please fix the following errors:

                </div>

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                    @endforeach

                </ul>

            </div>

            @endif


            {{-- ========================================= --}}
            {{-- STATISTICS --}}
            {{-- ========================================= --}}

            <div class="row g-3 mb-4">

                {{-- Total Users --}}

                <div class="col-lg-4 col-md-6">

                    <div class="dashboard-card stat-card">

                        <div class="stat-icon blue">

                            <i class="bi bi-people"></i>

                        </div>

                        <div class="stat-label">
                            Total Users
                        </div>

                        <div class="stat-value">
                            {{ number_format($totalUsers) }}
                        </div>

                    </div>

                </div>


                {{-- Average Age --}}

                <div class="col-lg-4 col-md-6">

                    <div class="dashboard-card stat-card">

                        <div class="stat-icon green">

                            <i class="bi bi-bar-chart"></i>

                        </div>

                        <div class="stat-label">
                            Average Age
                        </div>

                        <div class="stat-value">

                            {{ $averageAge ? number_format($averageAge, 1) : '0' }}

                            <span
                                class="fs-6 fw-normal text-muted">
                                years
                            </span>

                        </div>

                    </div>

                </div>


                {{-- New Users --}}

                <div class="col-lg-4 col-md-6">

                    <div class="dashboard-card stat-card">

                        <div class="stat-icon orange">

                            <i class="bi bi-person-plus"></i>

                        </div>

                        <div class="stat-label">
                            New Users Today
                        </div>

                        <div class="stat-value">
                            {{ number_format($newUsersToday) }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================= --}}
            {{-- FILTER PANEL --}}
            {{-- ========================================= --}}

            <div class="filter-card mb-4">

                <div class="filter-header">

                    <div class="d-flex align-items-center">

                        <i
                            class="bi bi-funnel-fill text-primary me-2">
                        </i>

                        <span class="filter-title">
                            Search & Filters
                        </span>

                    </div>

                </div>


                <div class="p-4">

                    <form
                        method="GET"
                        action="{{ route('users.index') }}">

                        <div class="row g-3">

                            {{-- Search --}}

                            <div class="col-lg-6">

                                <label class="form-label">
                                    Search Users
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-white">

                                        <i class="bi bi-search text-muted"></i>

                                    </span>

                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control"
                                        placeholder="Name, email, phone, ID or age..."
                                        value="{{ request('search') }}">

                                </div>

                            </div>


                            {{-- Records Per Page --}}

                            <div class="col-lg-3 col-md-6">

                                <label class="form-label">
                                    Records Per Page
                                </label>

                                <select
                                    name="per_page"
                                    class="form-select">

                                    @foreach([5,10,15,25,50] as $number)

                                    <option
                                        value="{{ $number }}"
                                        {{ $perPage == $number ? 'selected' : '' }}>

                                        {{ $number }} records

                                    </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- Sort By --}}

                            <div class="col-lg-3 col-md-6">

                                <label class="form-label">
                                    Sort By
                                </label>

                                <select
                                    name="sort_by"
                                    class="form-select">

                                    <option
                                        value="id"
                                        {{ $sortBy == 'id' ? 'selected' : '' }}>
                                        ID
                                    </option>

                                    <option
                                        value="name"
                                        {{ $sortBy == 'name' ? 'selected' : '' }}>
                                        Name
                                    </option>

                                    <option
                                        value="email"
                                        {{ $sortBy == 'email' ? 'selected' : '' }}>
                                        Email
                                    </option>

                                    <option
                                        value="age"
                                        {{ $sortBy == 'age' ? 'selected' : '' }}>
                                        Age
                                    </option>

                                    <option
                                        value="created_at"
                                        {{ $sortBy == 'created_at' ? 'selected' : '' }}>
                                        Registration Date
                                    </option>

                                </select>

                            </div>


                            {{-- Age From --}}

                            <div class="col-lg-3 col-md-6">

                                <label class="form-label">
                                    Age From
                                </label>

                                <input
                                    type="number"
                                    name="age_from"
                                    class="form-control"
                                    min="18"
                                    max="100"
                                    placeholder="Minimum age"
                                    value="{{ request('age_from') }}">

                            </div>


                            {{-- Age To --}}

                            <div class="col-lg-3 col-md-6">

                                <label class="form-label">
                                    Age To
                                </label>

                                <input
                                    type="number"
                                    name="age_to"
                                    class="form-control"
                                    min="18"
                                    max="100"
                                    placeholder="Maximum age"
                                    value="{{ request('age_to') }}">

                            </div>


                            {{-- Date From --}}

                            <div class="col-lg-3 col-md-6">

                                <label class="form-label">
                                    Registration From
                                </label>

                                <input
                                    type="date"
                                    name="date_from"
                                    class="form-control"
                                    value="{{ request('date_from') }}">

                            </div>


                            {{-- Date To --}}

                            <div class="col-lg-3 col-md-6">

                                <label class="form-label">
                                    Registration To
                                </label>

                                <input
                                    type="date"
                                    name="date_to"
                                    class="form-control"
                                    value="{{ request('date_to') }}">

                            </div>


                            {{-- Sort Direction --}}

                            <div class="col-lg-3 col-md-6">

                                <label class="form-label">
                                    Sort Direction
                                </label>

                                <select
                                    name="sort_direction"
                                    class="form-select">

                                    <option
                                        value="asc"
                                        {{ $sortDirection == 'asc' ? 'selected' : '' }}>

                                        Ascending

                                    </option>

                                    <option
                                        value="desc"
                                        {{ $sortDirection == 'desc' ? 'selected' : '' }}>

                                        Descending

                                    </option>

                                </select>

                            </div>


                            {{-- Buttons --}}

                            <div class="col-lg-9 col-md-6 d-flex align-items-end gap-2">

                                <button
                                    type="submit"
                                    class="btn btn-primary px-4">

                                    <i class="bi bi-search me-1"></i>

                                    Apply Filters

                                </button>

                                <a
                                    href="{{ route('users.index') }}"
                                    class="btn btn-light border px-4">

                                    <i class="bi bi-arrow-counterclockwise me-1"></i>

                                    Reset

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

            </div>


            {{-- ========================================= --}}
            {{-- USER TABLE --}}
            {{-- ========================================= --}}

            <div class="users-card">

                {{-- Table Header --}}

                <div class="users-header">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                        <div>

                            <h5 class="users-title">
                                All Users
                            </h5>

                            <div class="result-count mt-1">

                                Showing

                                <strong>
                                    {{ $users->firstItem() ?? 0 }}
                                </strong>

                                to

                                <strong>
                                    {{ $users->lastItem() ?? 0 }}
                                </strong>

                                of

                                <strong>
                                    {{ $users->total() }}
                                </strong>

                                users

                            </div>

                        </div>

                        <div>

                            <span class="badge bg-light text-dark border px-3 py-2">

                                <i class="bi bi-database me-1"></i>

                                {{ $users->total() }} Total

                            </span>

                        </div>

                    </div>

                </div>


                {{-- Table --}}

                <div class="table-responsive">

                    @if($users->count())

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    User
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Phone
                                </th>

                                <th>
                                    Age
                                </th>

                                <th>
                                    Registered
                                </th>

                                <th class="text-end">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($users as $user)

                            <tr>

                                {{-- ID --}}

                                <td>

                                    <span class="id-badge">

                                        #{{ $user->id }}

                                    </span>

                                </td>


                                {{-- User --}}

                                <td>

                                    <div class="d-flex align-items-center">

                                        <div class="user-avatar">

                                            {{ strtoupper(substr($user->name, 0, 1)) }}

                                        </div>

                                        <div>

                                            <div class="user-name">

                                                {{ $user->name }}

                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- Email --}}

                                <td>

                                    <span class="user-email">

                                        {{ $user->email }}

                                    </span>

                                </td>


                                {{-- Phone --}}

                                <td>

                                    {{ $user->phone ?? '-' }}

                                </td>


                                {{-- Age --}}

                                <td>

                                    <span class="age-badge">

                                        {{ $user->age }} years

                                    </span>

                                </td>


                                {{-- Date --}}

                                <td>

                                    <span class="date-text">

                                        <i class="bi bi-calendar3 me-1"></i>

                                        {{ $user->created_at->format('d M Y') }}

                                    </span>

                                </td>


                                {{-- Actions --}}

                                <td>

                                    <div class="d-flex justify-content-end gap-2">

                                        {{-- View --}}

                                        <a
                                            href="{{ route('users.show', $user) }}"
                                            class="action-btn action-view"
                                            title="View User">

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- Delete --}}

                                        <form
                                            method="POST"
                                            action="{{ route('users.destroy', $user) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this user?');">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn action-delete"
                                                title="Delete User">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                    @else

                    {{-- Empty State --}}

                    <div class="empty-state">

                        <div class="empty-icon">

                            <i class="bi bi-people"></i>

                        </div>

                        <h5 class="fw-semibold">
                            No users found
                        </h5>

                        <p class="text-muted mb-4">

                            No users match your current search or filters.

                        </p>

                        <div class="d-flex justify-content-center gap-2">

                            <a
                                href="{{ route('users.index') }}"
                                class="btn btn-light border">

                                Reset Filters

                            </a>

                            <a
                                href="{{ route('users.create') }}"
                                class="btn btn-primary">

                                <i class="bi bi-person-plus me-1"></i>

                                Add User

                            </a>

                        </div>

                    </div>

                    @endif

                </div>


                {{-- ========================================= --}}
                {{-- PAGINATION --}}
                {{-- ========================================= --}}

                @if($users->hasPages())

                <div class="pagination-wrapper">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <div class="text-muted small">

                            Page

                            <strong>
                                {{ $users->currentPage() }}
                            </strong>

                            of

                            <strong>
                                {{ $users->lastPage() }}
                            </strong>

                        </div>

                        <div>

                            {{ $users->links('pagination::bootstrap-5') }}

                        </div>

                    </div>

                </div>

                @endif

            </div>

        </div>

    </div>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>