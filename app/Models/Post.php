<?php

namespace App\Models;

use App\Formatters\DateFormatter;
use App\Interfaces\HasReports;
use App\Traits\FormatCreatedAdDateTrait;
use App\Traits\Reportable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia, HasReports
{
    use SoftDeletes, HasSlug, HasMediaTrait, Reportable, FormatCreatedAdDateTrait;

    const STATUS_VISIBLE = 1;
    const STATUS_ARCHIVED = 2;
    const STATUS_HIDDEN = 3;

    protected $statuses = [
        self::STATUS_VISIBLE => 'Visible',
        self::STATUS_ARCHIVED => 'Archived',
        self::STATUS_HIDDEN => 'Hidden',
    ];

    protected $fillable = [
        'title',
        'description',
        'location',
        'viewed_times',
        'updated_at',
        'user_id',
        'category_id',
        'price',
        'status',
        'currency_id',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Company.
     *
     * @return BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Category.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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
     * Gets category name.
     *
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->category->name;
    }

    /**
     * Checks if post is viewable.
     *
     * @return bool
     */
    public function isViewable(): bool
    {
        return $this->status != self::STATUS_HIDDEN;
    }

    /**
     * Checks if auth is owner of the post.
     *
     * @return bool
     */
    public function authIsOwner(): bool
    {
        return $this->company->user_id === auth()->id();
    }

    /**
     * Checks if post is archived.
     *
     * @return bool
     */
    public function isArchived(): bool
    {
        return $this->status == self::STATUS_ARCHIVED;
    }

    /**
     * Checks if post is hidden.
     *
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->status == self::STATUS_HIDDEN;
    }

    /**
     * Hides the post.
     */
    public function hide()
    {
        $this->update(['status' => self::STATUS_HIDDEN]);
    }

    /**
     * Unhides the post.
     */
    public function unhide()
    {
        $this->update(['status' => self::STATUS_VISIBLE]);
    }

    /**
     * Gets picture URL.
     *
     * @return string
     */
    public function getPictureUrl(): string
    {
        return $this->getFirstMedia('picture')
            ? $this->getFirstMediaUrl('picture')
            : asset('img/default_post_picture.jpg');
    }

    /**
     * Gets post status as string.
     *
     * @return string
     */
    public function getStatusAsString(): string
    {
        return $this->statuses[$this->status];
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
     * Checks if post is in bookmarks.
     *
     * @return bool
     */
    public function isInBookmarks(): bool
    {
        return $this
            ->bookmarks()
            ->where('post_id', $this->id)
            ->where('user_id', auth()->id())
            ->exists();
    }

    /**
     * Adds post to auths bookmarks.
     */
    public function addToBookmarks()
    {
        Auth::user()->bookmarks()->create(['post_id' => $this->id]);
    }

    /**
     * Removes post from auths bookmarks.
     */
    public function removeFromBookmarks()
    {
        $this->bookmarks()->where('user_id', Auth::id())->delete();
    }

    /**
     * Reports.
     *
     * @return HasMany
     */
    public function reports()
    {
        return $this->hasMany(Report::class, 'model_id');
    }

    /**
     * Currency.
     *
     * @return BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     *
     */
    public function archive()
    {
        $this->update(['status' => self::STATUS_ARCHIVED]);
    }
}
