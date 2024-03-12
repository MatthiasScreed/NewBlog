<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

//use App\Models\Category;

class UserController extends BackendController
{
    public function index()
    {
        $users = User::orderBy('name');
        $usersCount = User::count();

        return view('users.index', [
            'users' => $users,
            'usersCount' => $usersCount,
        ]);
    }

    /**
     *
     */
    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->attachRole($request->role);
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

        $user->detachRoles();
        $user->attachRole($request->role);

        return redirect('admin.user.index')->with("success", "Users updated correctly");
    }

    public function destroy(DestroyUserRequest $request, User $user)
    {
        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if ($deleteOption == "delete") {
            // delete user posts
            $user->posts()->withTrashed()->forceDelete();
        }
        elseif ($deleteOption == "attribute") {
            $user->posts()->update(['author_id' => $selectedUser]);
        }

        $user->delete();
        return redirect('admin.user.index')->with("success", "User suppress correctly");
    }

    public function confirm($request,$id)
    {
        $user= User::findOrFail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');

        return view("users.confirm", compact('user', 'users'));

    }

}
