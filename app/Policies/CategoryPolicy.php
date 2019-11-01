<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function bePinned()
    {
        return Category::countPinned() < 5
            ? Response::allow()
            : Response::deny('You can not pin this category!');
    }

    public function beUnpinned(Category $category)
    {
        return $category->isPinned()
            ? Response::allow()
            : Response::deny();
    }
}
