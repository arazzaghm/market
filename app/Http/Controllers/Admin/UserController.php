<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\ChangeUserDataRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Shows users index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate('50');

        return view('admins.pages.users.index', compact('users'));
    }

    /**
     * Shows the edit blade
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admins.pages.users.edit', compact('user'));
    }

    /**
     * Updates the user
     *
     * @param ChangeUserDataRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ChangeUserDataRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('admin.users.index');
    }

    /**
     * Deletes the user from DB
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
