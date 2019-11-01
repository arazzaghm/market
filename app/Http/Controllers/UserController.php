<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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
}
