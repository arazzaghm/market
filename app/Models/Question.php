<?php

namespace App\Models;

use App\Formatters\DateFormatter;
use App\Traits\FormatCreatedAdDateTrait;
use App\Traits\ViewedTrait;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Question extends Model
{
    use ViewedTrait, FormatCreatedAdDateTrait;

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

    /**
     * Answer.
     *
     * @return HasOne
     */
    public function answer()
    {
        return $this->hasOne(QuestionAnswer::class);
    }

    /**
     * Gets status as string.
     *
     * @return string
     */
    public function getStatusAsString(): string
    {
        return $this->statues[$this->status];
    }

    /**
     *
     * /**
     * Checks if question is opened.
     *
     * @return bool
     */
    public function isOpened(): bool
    {
        return $this->status == self::STATUS_OPENED;
    }

    /**
     * Checks if question is answered.
     *
     * @return bool
     */
    public function isAnswered(): bool
    {
        return $this->answer()->exists();
    }

    /**
     * Checks if question is closed.
     *
     * @return bool
     */
    public function close()
    {
        return $this->update(['status' => self::STATUS_CLOSED]);
    }

    /**
     * Counts opened questions.
     *
     * @return int
     */
    public static function countOpened(): int
    {
        return self::where('status', self::STATUS_OPENED)->count();
    }
}
