<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $totalQuestions = Question::count();

        $totalOpenedQuestions = Question::where('status', Question::STATUS_OPENED)->count();

        $totalClosedQuestions = $totalOpenedQuestions - $totalOpenedQuestions;

        $questions = Question::paginate(50);

        return view('admins.pages.questions.index', compact(
            'questions',
            'totalQuestions',
            'totalOpenedQuestions',
            'totalClosedQuestions'
        ));
    }

    public function show(Question $question)
    {
        if ($question->isNotViewed()) {
            $question->makeViewed();
        }

        return view('admins.pages.questions.show', ['question' => $question]);
    }
}
