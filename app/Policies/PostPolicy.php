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

    /**
     * Checks if post can be updated.
     *
     * @param User $user
     * @param Post $post
     * @return Response
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    /**
     * Checks if post can be viewed.
     *
     * @param User|null $user
     * @param Post $post
     * @return Response
     */
    public function view(?User $user, Post $post)
    {
        return !Auth::check() && $post->isViewable() || Auth::check() && $user->isAdmin() || $post->isViewable() || $post->authIsOwner()
            ? Response::allow()
            : Response::deny('You can not see this post.');
    }

    /**
     * Checks if post can be archived.
     *
     * @param User $user
     * @param Post $post
     * @return Response
     */
    public function archive(User $user, Post $post)
    {
        return $user->id === $post->user_id && !$post->isArchived()
            ? Response::allow()
            : Response::deny('You do can not archive this post.');
    }
}
