<?php

namespace App\Models;

use App\Classes\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Checks if user is admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === Role::ADMIN;
    }

    /**
     * Gets role name as string
     *
     * @return string
     */
    public function getRoleNameAsString(): string
    {
        return Role::$names[$this->role];
    }
}
