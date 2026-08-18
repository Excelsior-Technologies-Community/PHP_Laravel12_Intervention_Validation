<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * Uses Form Request validation.
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();

        // Hash password before storing it.
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully!');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();

        /*
         * Password is optional during update.
         *
         * If no new password is supplied, keep the existing password.
         */
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make(
                $validatedData['password']
            );
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully!');
    }

    /**
     * Search users by name or email.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');

        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('users.index', compact('users', 'search'));
    }
}