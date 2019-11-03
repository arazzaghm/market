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
        $countedPosts = $user->posts()->count();

        $reportTypes = $user->reportTypes()->get();

        $countedArchivedPosts = $user->archivedPosts()->count();

        $countedHiddenPosts = $user->hiddenPosts()->count();

        $posts = $user->posts()->with('Category')->paginate(12);

        return view('pages.users.show', compact(
            'user',
            'countedPosts',
            'posts',
            'countedArchivedPosts',
            'countedHiddenPosts',
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
