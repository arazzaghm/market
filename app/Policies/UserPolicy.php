<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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
}
