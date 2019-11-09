<?php

namespace App\Models;

use App\Formatters\IconNameFormatter;
use App\Returners\NameReturner;
use App\Traits\NameGetterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug, NameGetterTrait;

    protected $fillable = [
        'name',
        'icon_name',
        'is_pinned',
        'slug',
        'name_uk',
        'name_ru',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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
     * Posts.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Gets the fa icon name.
     *
     * For example: fa-example.
     *
     * @return mixed|string
     */
    public function getFaIconName()
    {
        $iconName = new IconNameFormatter($this->icon_name);

        return $iconName->format();
    }

    /**
     * Check if category is pinned.
     *
     * @return bool
     */
    public function isPinned(): bool
    {
        return $this->is_pinned == true;
    }

    /**
     * Check if category is not pinned.
     *
     * @return bool
     */
    public function isNotPinned(): bool
    {
        return $this->isPinned() == false;
    }

    /**
     * Pins the category.
     *
     * @return bool
     */
    public function pin()
    {
        return $this->update(['is_pinned' => true]);
    }

    /**
     * Unpins the category.
     *
     * @return bool
     */
    public function unpin()
    {
        return $this->update(['is_pinned' => false]);
    }

    /**
     * Counts pinned categories.
     *
     * @return int
     */
    public static function countPinned(): int
    {
        return self::where('is_pinned', true)->count();
    }
}
