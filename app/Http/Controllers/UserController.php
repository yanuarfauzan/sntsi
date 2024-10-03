<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::select('id', 'name', 'email', 'role')->orderBy('role', 'asc')->get()
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string',]
        ]);

        $attributes['role'] = 1;

        User::create($attributes);

        return redirect()->to('/users')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'string']
        ]);

        $user->update(array_filter($attributes));

        return redirect()->to('/users')->with('success', 'User berhasil diubah');
    }

    public function destroy(User $user)
    {
        if (auth()->user()->role > 0) {
            return back()->with('error', 'Anda tidak memiliki has akses');
        }

        if ($user->id != auth()->id()) {
            $user->delete();
            return back()->with('success', 'User berhasil dihapus');
        }

        return back()->with('error', 'User gagal dihapus');
    }
}
