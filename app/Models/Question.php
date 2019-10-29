<?php

namespace App\Models;

use App\Traits\ViewedTrait;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use ViewedTrait;

    const STATUS_OPENED = 1;
    const STATUS_CLOSED = 2;

    protected $fillable = [
        'user_id',
        'title',
        'text',
        'status',
        'is_viewed'
    ];

    public function isViewed(): bool
    {
        return $this->is_viewed == true;
    }
}
