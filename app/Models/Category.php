<?php

namespace App\Models;

use App\Formatters\IconNameFormatter;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;

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

    protected $fillable = ['name', 'icon_name', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getFaIconName()
    {
        $iconName = new IconNameFormatter($this->icon_name);

        return $iconName->format();
    }
}
