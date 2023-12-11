<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

//use App\Models\Category;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => \App\Models\User::all(),
        ]);
    }

    /**
     *
     */
    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->all());

        return redirect('admin.user.index')->with("success", "New users add correctly");
    }
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect('admin.user.index')->with("success", "Users updated correctly");
    }

    public function destroy(DestroyUserRequest $request, User $user)
    {
        $user->delete();
        return redirect('admin.user.index')->with("success", "User suppress correctly");
    }

}
