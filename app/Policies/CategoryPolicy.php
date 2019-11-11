<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Checks if category can be pinned.
     *
     * @return Response
     */
    public function bePinned()
    {
        return Category::countPinned() < 5
            ? Response::allow()
            : Response::deny(trans('response.category.deny.pin'));
    }

    /**
     * Checks if category can be unpinned.
     *
     * @param Category $category
     * @return Response
     */
    public function beUnpinned(Category $category)
    {
        return $category->isPinned()
            ? Response::allow()
            : Response::deny(trans('response.category.deny.unpin'));
    }
}
