<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index')->with([
            'users' => $users,
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')->with([
            'user' => $user,
        ]);
    }

    public function update(User $user)
    {
        $user->update(request()->all());

        return view('admin.users.edit')->with([
            'user' => $user,
        ]);
    }
}
