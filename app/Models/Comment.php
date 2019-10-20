<?php

namespace App\Models;

use App\Formatters\CommentDateFormatter;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'anonymous',
        'post_id',
        'user_id',
        'created_at',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formatCreatedAtDate()
    {
        $date = new CommentDateFormatter($this->created_at);
        return $date->format();
    }

}
