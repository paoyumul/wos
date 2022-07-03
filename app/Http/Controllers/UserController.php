<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $users = User::where('last_name', 'like', '%'. $request->search.'%')
            ->orWhere('first_name', 'like', '%'. $request->search.'%')
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
        $this->authorize('create', User::class);

        return inertia('Users/Create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        User::create($request->all());

        session()->flash('message', 'Post deleted successfully!');

        return back();
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $user->load('appointments.schedule', 'appointments.service', 'payments.service');

        return inertia('Users/Edit', [
            'data' => [
                'user' => $user,
            ],
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->all());

        session()->flash('message', 'User profile has been updated.');

        return redirect()->route('admin.users.edit', $user->id);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        session()->flash('message', 'User profile has been deleted.');

        return back();
    }
}
