<?php

namespace App\Models;

use App\Classes\Role;
use App\Formatters\UserNameFormatter;
use App\Traits\ReportableTrait;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Self_;
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
     * Checks if user is online.
     *
     * @return bool
     */
    public function isOnline(): bool
    {
        return Cache::has('user-online-' . $this->id);
    }

    /**
     *  Posts.
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Popular posts.
     * @return HasMany
     */
    public function popularPosts($direction = 'desc')
    {
        return $this->hasMany(Post::class)->orderBy('viewed_times', $direction);
    }

    /**
     * Hidden posts.
     * @return HasMany
     */
    public function hiddenPosts()
    {
        return $this->hasMany(Post::class)->where('status','=', Post::STATUS_HIDDEN);
    }

    /**
     * Archived posts.
     *
     * @return HasMany
     */
    public function archivedPosts()
    {
        return $this->hasMany(Post::class)->where('status','=', Post::STATUS_ARCHIVED);
    }

    /**
     * Comments.
     *
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Bookmarks.
     *
     * @return HasMany
     */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Gets formatted full name.
     *
     * @return mixed|string
     */
    public function getFormattedFulName()
    {
        $this->isBanned() ? $prefix = 'Banned' : $prefix = null;

        $name = new UserNameFormatter($this->name, $prefix);

        return $name->format();
    }

    /**
     * Created reports.
     *
     * @return HasMany
     */
    public function createdReports()
    {
        return $this->hasMany(Report::class, 'user_id');
    }

    /**
     * Received reports.
     *
     * @return HasMany
     */
    public function receivedReports()
    {
        return $this->hasMany(Report::class, 'model_id');
    }

    /**
     * Questions.
     *
     * @return HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Gets avatar URL.
     *
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return $this->getFirstMedia('avatar')
            ? $this->getFirstMediaUrl('avatar')
            : asset('img/default_avatar.png');
    }
}
