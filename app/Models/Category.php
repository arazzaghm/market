<?php

namespace App\Models;

use App\Formatters\IconNameFormatter;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'icon_name'];

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
