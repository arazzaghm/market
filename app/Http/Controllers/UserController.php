<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Data\UpdateUserRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function show(User $user)
    {
        $reportTypes = $user->reportTypes()->get();

        return view('pages.users.show', compact(
            'user',
            'reportTypes'
        ));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $params = $request->validated();

        $this->userService->updateUser($user, $params);

        return back();
    }
}
