<?php

namespace App\Models;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'icon_name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
