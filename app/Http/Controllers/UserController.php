<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $countedPosts = $user->posts()->count();

        return view('pages.users.show', compact('user', 'countedPosts'));
    }
}
