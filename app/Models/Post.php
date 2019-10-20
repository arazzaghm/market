<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'viewed_times',
        'updated_at',
        'user_id',
        'category_id',
        'price',
    ];

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
}
