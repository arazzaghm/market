<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = 'answers';

    protected $fillable = ['question_id', 'text'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
