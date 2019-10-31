<?php

namespace App\Http\Controllers;

use App\Models\PopularQuestion;
use Illuminate\Http\Request;

class PopularQuestionController extends Controller
{
    public function index()
    {
        $popularQuestions = PopularQuestion::paginate(10);

        return view('pages.popularQuestions.index', compact('popularQuestions'));
    }
}
