<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use SoftDeletes, HasSlug;

    const STATUS_VISIBLE = 1;
    const STATUS_ARCHIVED = 2;
    const STATUS_HIDDEN = 3;

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
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCategoryName(): string
    {
        return $this->category()->first()->name;
    }

    public function isViewable(): bool
    {
        return $this->status != self::STATUS_HIDDEN;
    }

    public function authIsOwner(): bool
    {
        return $this->user_id === auth()->id();
    }

    public function isArchived(): bool
    {
        return $this->status == self::STATUS_ARCHIVED;
    }

    public function isHidden(): bool
    {
        return $this->status == self::STATUS_HIDDEN;
    }

    public function hide()
    {
        $this->update(['status' => self::STATUS_HIDDEN]);
    }

    public function unhide()
    {
        $this->update(['status' => self::STATUS_VISIBLE]);
    }
}
