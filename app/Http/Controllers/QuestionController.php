<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\CreateQuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Auth::user()->questions()->orderByDesc('created_at')->simplePaginate(3);

        return view('pages.questions.index', compact('questions'));
    }

    public function store(CreateQuestionRequest $request)
    {
        Auth::user()->questions()->create($request->validated());

        return redirect()->route('questions.index');
    }

    public function show(Question $question)
    {
        $this->authorize('view', $question);

        if ($question->isAnswered() && $question->answer->isNotViewed()) {
            $question->answer->makeViewed();
        }

        return view('pages.questions.show', compact('question'));
    }
}
