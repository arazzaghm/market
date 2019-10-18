<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Avatar\StoreAvatarRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function store(StoreAvatarRequest $request, User $user)
    {
        if ($user->hasMedia('avatar')) {
            $user->getFirstMedia('avatar')->delete();
        }
        $user->addMedia($request->avatar)->toMediaCollection('avatar');

        return back();
    }
}
