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

        $countedArchivedPosts = $user->posts()->where('status', Post::STATUS_ARCHIVED)->count();

        $countedHiddenPosts = $user->posts()->where('status', Post::STATUS_HIDDEN)->count();

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
