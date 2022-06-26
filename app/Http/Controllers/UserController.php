<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(Request $request)
    {
        Log::debug($request->search);
        $users = User::search($request->search)
            ->paginate(30);

        return inertia('Users/Index', [
            'data' => [
                'users' => $users->items(),
                'paginator' => $users,
            ],
        ]);
    }

    public function create()
    {
        return inertia('Users/Create');
    }

    public function store()
    {
        User::create(request()->all());

        session()->flash('message', 'Post deleted successfully!');

        return back();
    }

    public function edit(User $user)
    {
        return inertia('Users/Edit', [
            'data' => [
                'user' => $user,
            ],
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        session()->flash('message', 'User profile has been updated.');

        return redirect()->route('admin.users.edit', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('message', 'User profile has been deleted.');

        return back();
    }
}
