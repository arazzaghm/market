<?php

namespace App\Models;

use App\Formatters\DateFormatter;
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

    private $statues = [
        self::STATUS_OPENED => 'Opened',
        self::STATUS_CLOSED => 'Closed',
    ];

    public function answer()
    {
        return $this->hasOne(QuestionAnswer::class);
    }

    public function getStatusAsString(): string
    {
        return $this->statues[$this->status];
    }

    public function formatCreatedAtDate(): string
    {
        $date = new DateFormatter($this->created_at);

        return $date->format();
    }

    public function isOpened(): bool
    {
        return $this->status == self::STATUS_OPENED;
    }

    public function isAnswered(): bool
    {
        return $this->answer()->exists();
    }

    public function close()
    {
        return $this->update(['status' => self::STATUS_CLOSED]);
    }
}
