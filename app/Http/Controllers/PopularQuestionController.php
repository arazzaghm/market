<?php

namespace App\Http\Controllers;

use App\Models\PopularQuestion;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PopularQuestionController extends Controller
{
    /**
     * Shows popular questions.
     *
     * @return Factory|View
     */
    public function index()
    {
        $popularQuestions = PopularQuestion::paginate(10);

        return view('pages.popular-questions.index', compact('popularQuestions'));
    }
}
