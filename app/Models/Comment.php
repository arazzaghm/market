<?php

namespace App\Models;

use App\Formatters\DateFormatter;
use App\Traits\FormatCreatedAdDateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use FormatCreatedAdDateTrait;
    protected $fillable = [
        'text',
        'anonymous',
        'post_id',
        'user_id',
        'created_at',
    ];

    /**
     * Post.
     *
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * User.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
