<?php

namespace App\Services;

use App\Models\User;
use App\Traits\UploadPhotoTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserService
{
    use UploadPhotoTrait;

    private $object;

    /**
     * Updates user data.
     *
     * @param User $user
     * @param $params
     * @return RedirectResponse
     */
    public function updateUser(User $user, $params)
    {
        if (isset($params['old_password']) && isset($params['password'])) {
            if (Hash::check($params['old_password'], $user->password) && $params['password']) {
                unset($params['old_password']);
                $params['password'] = Hash::make($params['password']);
                $user->update($params);
            } else if (!Hash::check($params['old_password'], $user->password) && $params['password']) {
                return back()->withErrors(['old_password' => 'You have entered an incorrect password!']);
            };
        } else {
            $user->update($params);
        }
    }

    /**
     * Handles uploaded photo.
     *
     * @param User $user
     * @param $photo
     */
    public function handleUploadedPhoto(User $user, $photo)
    {
        $this->object = $user;

        $this->upload($photo, 'avatar');
    }
}
