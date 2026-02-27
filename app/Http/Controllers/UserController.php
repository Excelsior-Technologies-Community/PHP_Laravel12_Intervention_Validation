<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'nullable|numeric|digits_between:10,15',
            'age' => 'required|integer|min:18|max:100',
            'bio' => 'nullable|string|max:500',
        ]);

        User::create($validatedData);

        return redirect()->route('users.index')
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
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|email|unique:users,email,' . $user->id . '|max:255',
            'phone' => 'nullable|numeric|digits_between:10,15',
            'age' => 'required|integer|min:18|max:100',
            'bio' => 'nullable|string|max:500',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
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
                    ->paginate(10);

        return view('users.index', compact('users', 'search'));
    }
}