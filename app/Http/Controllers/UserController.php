<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return inertia('Users/Index', [
            'users' => $users,
        ]);
    }

    public function edit(User $user)
    {
        return inertia('Users/Edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin.users.edit', $user->id);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        $request->session()->flash('success', 'Post deleted successfully!');

        return redirect()->route('admin.users.index');
    }
}
