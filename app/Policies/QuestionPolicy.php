<?php

namespace App\Policies;

use App\Models\Question;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Checks if question can be viewed.
     *
     * @param User $user
     * @param Question $question
     * @return Response
     */
    public function view(User $user, Question $question)
    {
        return $question->user_id == $user->id
            ? Response::allow()
            : Response::deny(trans('response.page.deny.view'));
    }

    /**
     * Checks if question can be answered.
     *
     * @param User $user
     * @param Question $question
     * @return bool
     */
    public function beAnswered(User $user, Question $question)
    {
        return $question->isOpened() && !$question->isAnswered();
    }
}
