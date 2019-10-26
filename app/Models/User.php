<?php

namespace App\Models;

use App\Classes\Role;
use App\Formatters\UserNameFormatter;
use App\Traits\ReportableTrait;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMedia, BannableContract
{
    use Notifiable, HasMediaTrait, Bannable, ReportableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'banned_at',
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

    /**
     * @return bool
     */
    public function isOnline(): bool
    {
        return Cache::has('user-online-' . $this->id);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function getFormattedFulName()
    {
       $this->isBanned() ?  $prefix = 'Banned' : $prefix = null;

        $name = new UserNameFormatter($this->name, $prefix);

        return $name->format();
    }

    public function createdReports()
    {
        return $this->hasMany(Report::class, 'user_id');
    }

    public function receivedReports()
    {
        return $this->hasMany(Report::class, 'model_id');
    }
}
