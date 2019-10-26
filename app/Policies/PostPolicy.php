<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function view(?User $user, Post $post)
    {
        return !Auth::check() && $post->isViewable() || $user->isAdmin() || $post->isViewable() || $post->authIsOwner()
            ? Response::allow()
            : Response::deny('You can not see this post.');
    }
}
