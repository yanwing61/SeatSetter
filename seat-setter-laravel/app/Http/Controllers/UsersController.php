<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;

class UsersController extends Controller
{
    public function list()
    {

        return view('users.list', [
            'users' => User::all()
        ]);

    }

    public function addForm()
    {

        return view('users.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $attributes['name'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->save();

        return redirect('/console/users/list')
            ->with('message', 'User has been added!');

    }

    public function editForm(User $user)
    {

        return view('users.edit', [
            'user' => $user,
        ]);

    }

    public function edit(User $user)
    {

        $attributes = request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable',
        ]);

        $user->name = $attributes['name'];
        $user->email = $attributes['email'];

        if($attributes['password']) $user->password = $attributes['password'];

        $user->save();

        return redirect('/console/users/list')
            ->with('message', 'User has been edited.');

    }

    public function delete(User $user)
    {

        if($user->id == auth()->user()->id)
        {
            return redirect('/console/users/list')
                ->with('message', 'You cannot delete your own user account!');        
        }
        
        $user->delete();

        return redirect('/console/users/list')
            ->with('message', 'User has been deleted.');                
        
    }
}
