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

        $totalClosedQuestions = $totalQuestions - $totalOpenedQuestions;

        $openedQuestions = Question::where('status', Question::STATUS_OPENED)->paginate(25);
        $closedQuestions = Question::where('status', Question::STATUS_CLOSED)->paginate(25);

        return view('admins.pages.questions.index', compact(
            'openedQuestions',
            'closedQuestions',
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

    public function answer(Request $request, Question $question)
    {
        $question->answer()->create([
            'text' => $request->text
        ]);

        $question->close();

        return back();
    }
}
