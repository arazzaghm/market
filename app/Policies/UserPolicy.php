<?php

namespace App\Policies;

use App\Classes\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param User $visitor
     * @return bool
     */
    public function editAvatar(User $user, User $visitor): bool
    {
        return $user->id === $visitor->id;
    }

    public function beBanned(User $firstUser, User $secondUser)
    {
        return !$secondUser->isAdmin() && $firstUser->isAdmin()
            ? Response::allow()
            : Response::deny();
    }
}
