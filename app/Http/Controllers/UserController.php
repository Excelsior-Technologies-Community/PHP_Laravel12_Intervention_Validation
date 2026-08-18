<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display users with search, filters, sorting and pagination.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => ['nullable', 'string', 'max:255'],

            'age_from' => [
                'nullable',
                'integer',
                'min:18',
                'max:100',
            ],

            'age_to' => [
                'nullable',
                'integer',
                'min:18',
                'max:100',
                'gte:age_from',
            ],

            'date_from' => [
                'nullable',
                'date',
            ],

            'date_to' => [
                'nullable',
                'date',
                'after_or_equal:date_from',
            ],

            'sort_by' => [
                'nullable',
                'in:id,name,email,age,created_at',
            ],

            'sort_direction' => [
                'nullable',
                'in:asc,desc',
            ],

            'per_page' => [
                'nullable',
                'integer',
                'in:5,10,15,25,50',
            ],
        ]);

        $query = User::query();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");

                if (is_numeric($search)) {
                    $q->orWhere('id', $search)
                        ->orWhere('age', $search);
                }
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Age From
        |--------------------------------------------------------------------------
        */

        if ($request->filled('age_from')) {
            $query->where(
                'age',
                '>=',
                $request->age_from
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Age To
        |--------------------------------------------------------------------------
        */

        if ($request->filled('age_to')) {
            $query->where(
                'age',
                '<=',
                $request->age_to
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Registration Date From
        |--------------------------------------------------------------------------
        */

        if ($request->filled('date_from')) {
            $query->whereDate(
                'created_at',
                '>=',
                $request->date_from
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Registration Date To
        |--------------------------------------------------------------------------
        */

        if ($request->filled('date_to')) {
            $query->whereDate(
                'created_at',
                '<=',
                $request->date_to
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        $allowedSorts = [
            'id',
            'name',
            'email',
            'age',
            'created_at',
        ];

        $sortBy = $request->get('sort_by', 'id');

        if (!in_array($sortBy, $allowedSorts, true)) {
            $sortBy = 'id';
        }

        $sortDirection = $request->get(
            'sort_direction',
            'asc'
        );

        if (!in_array(
            $sortDirection,
            ['asc', 'desc'],
            true
        )) {
            $sortDirection = 'asc';
        }

        $query->orderBy(
            $sortBy,
            $sortDirection
        );

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $perPage = (int) $request->get(
            'per_page',
            5
        );

        if (!in_array(
            $perPage,
            [5, 10, 15, 25, 50],
            true
        )) {
            $perPage = 5;
        }

        $users = $query
            ->paginate($perPage)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalUsers = User::count();

        $averageAge = User::query()
            ->whereNotNull('age')
            ->avg('age');

        $newUsersToday = User::query()
            ->whereDate(
                'created_at',
                today()
            )
            ->count();

        return view(
            'users.index',
            compact(
                'users',
                'totalUsers',
                'averageAge',
                'newUsersToday',
                'sortBy',
                'sortDirection',
                'perPage'
            )
        );
    }

    /**
     * Show create user form.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a new user.
     */
    public function store(StoreUserRequest $request)
    {
        User::create(
            $request->validated()
        );

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User created successfully!'
            );
    }

    /**
     * Display user details.
     */
    public function show(User $user)
    {
        return view(
            'users.show',
            compact('user')
        );
    }

    /**
     * Delete user.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User deleted successfully!'
            );
    }
}
