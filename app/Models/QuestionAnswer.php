<?php

namespace App\Models;

use App\Traits\ViewedTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class QuestionAnswer extends Model
{
    use ViewedTrait;

    protected $table = 'answers';

    protected $fillable = ['question_id', 'text', 'is_viewed'];

    /**
     * Question.
     *
     * @return BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Checks if auth has new answers.
     */
    public static function checkIfAuthHasNewAnswers()
    {
        return Auth::check() ? self::where('is_viewed', false)
            ->whereIn(
                'question_id',
                Auth::user()->questions()->get('id')
            )
            ->exists() : null;
    }

    /**
     * Counts auth new answers.
     */
    public static function countAuthNewAnswers()
    {
        return Auth::check() ? self::where('is_viewed', false)
            ->whereIn(
                'question_id',
                Auth::user()->questions()->get('id')
            )
            ->count() : null;
    }
}
