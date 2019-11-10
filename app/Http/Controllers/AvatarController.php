<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Avatar\StoreAvatarRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    private $userService;

    /**
     * AvatarController constructor.
     */
    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function store(StoreAvatarRequest $request, User $user)
    {
        $this->userService->handleUploadedPhoto($user, $request->avatar);

        return back();
    }
}
