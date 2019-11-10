<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\CreateQuestionRequest;
use App\Models\Question;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Questions index.
     *
     * @return Factory|View
     */
    public function index()
    {
        $questions = Auth::user()->questions()->orderByDesc('created_at')->simplePaginate(3);

        return view('pages.questions.index', compact('questions'));
    }

    /**
     * Stores question.
     *
     * @param CreateQuestionRequest $request
     * @return RedirectResponse
     */
    public function store(CreateQuestionRequest $request)
    {
        Auth::user()->questions()->create($request->validated());

        return redirect()->route('questions.index');
    }

    /**
     * Shows question.
     *
     * @param Question $question
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function show(Question $question)
    {
        $this->authorize('view', $question);

        if ($question->isAnswered() && $question->answer->isNotViewed()) {
            $question->answer->makeViewed();
        }

        return view('pages.questions.show', compact('question'));
    }
}
