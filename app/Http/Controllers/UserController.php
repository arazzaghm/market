<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Data\UpdateUserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(User $user)
    {
        $reportTypes = $user->reportTypes()->get();

        return view('pages.users.show', compact(
            'user',
            'reportTypes'
        ));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $params = $request->validated();

        if (isset($params['old_password']) && isset($params['password'])) {
            if (Hash::check($params['old_password'], $user->password) && $params['password']) {
                unset($params['old_password']);
                $params['password'] = Hash::make($params['password']);
                $user->update($params);
            } else if (!Hash::check($params['old_password'], $user->password) && $params['password']) {
                return back()->withErrors(['old_password' => 'You have entered an incorrect password!']);
            };
        } else {
            $user->update($params);
        }

        return back();
    }
}
