<?php

namespace App\Policies;

use App\Models\Question;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Question $question)
    {
        return $question->user_id == $user->id
            ? Response::allow()
            : Response::deny('404 not found.');
    }

    public function beAnswered(User $user, Question $question)
    {
        return $question->isOpened() && !$question->isAnswered();
    }
}
