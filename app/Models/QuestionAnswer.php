<?php

namespace App\Models;

use App\Traits\ViewedTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class QuestionAnswer extends Model
{
    use ViewedTrait;

    protected $table = 'answers';

    protected $fillable = ['question_id', 'text', 'is_viewed'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public static function checkIfAuthHasNewAnswers()
    {
        return self::where('is_viewed', false)
            ->whereIn(
                'question_id',
                Auth::user()->questions()->get('id')
            )
            ->exists();
    }

    public static function countAuthNewAnswers()
    {
        return self::where('is_viewed', false)
            ->whereIn(
                'question_id',
                Auth::user()->questions()->get('id')
            )
            ->count();
    }
}
