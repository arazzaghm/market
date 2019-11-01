<?php

namespace App\Models;

use App\Formatters\IconNameFormatter;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'icon_name', 'is_pinned', 'slug'];

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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getFaIconName()
    {
        $iconName = new IconNameFormatter($this->icon_name);

        return $iconName->format();
    }

    public function isPinned(): bool
    {
        return $this->is_pinned == true;
    }

    public function isNotPinned(): bool
    {
        return $this->isPinned() == false;
    }

    public function pin()
    {
        return $this->update(['is_pinned' => true]);
    }

    public function unpin()
    {
        return $this->update(['is_pinned' => false]);
    }

    public static function countPinned(): int
    {
        return self::where('is_pinned', true)->count();
    }
}
