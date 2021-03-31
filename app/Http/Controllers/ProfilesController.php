<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{

    public function show(User $user)
    {
        $tweets = $user->tweets;
        return view('profile.show', compact(['user', 'tweets']));
    }

    public function edit(User $user)
    {
//        $this->authorize('edit' , $user);
//        abort_if(user()->isNot($user) ,404) ;
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attribute = request()->validate([
            'username' => ['required', 'max:20', 'string', Rule::unique('users')->ignore($user), 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],

        ]);
        auth()->user()->update($attribute);
        return redirect($user->path());
    }

    public function updatePassword(User $user)
    {

        request()->validate([
            'password' => ['required', 'string', 'max:255']
        ]);
        $password = [
            'password' => Hash::make(request('password')),
        ];
        $user->update($password);

        return redirect(auth()->user()->path());
    }

    public function updateAvatar(User $user)
    {
//        return var_dump(request('avatar'));
        request()->validate([
            'avatar' => ['required', 'file']
        ]);
        echo 'validate';
        $avatar_path = request('avatar')->store('avatars');

        $user->picture = $avatar_path;
        $user->save();

        return redirect(auth()->user()->path());
    }
}
