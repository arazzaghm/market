<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PopularQuestion\CreatePopularQuestionRequest;
use App\Http\Requests\Admin\PopularQuestion\UpdatePopularQuestionRequest;
use App\Http\Requests\Question\CreateQuestionRequest;
use App\Models\PopularQuestion;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PopularQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $popularQuestions = PopularQuestion::paginate(50);

        $totalPopularQuestions = PopularQuestion::count();

        return view('admins.pages.popularQuestions.index', compact(
            'popularQuestions', 'totalPopularQuestions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admins.pages.popularQuestions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePopularQuestionRequest $request
     * @return Response
     */
    public function store(CreatePopularQuestionRequest $request)
    {
        PopularQuestion::create($request->validated());

        return redirect()->route('admin.popular-questions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PopularQuestion $popularQuestion
     * @return Response
     */
    public function edit(PopularQuestion $popularQuestion)
    {
        return view('admins.pages.popularQuestions.edit', compact('popularQuestion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePopularQuestionRequest $request
     * @param PopularQuestion $popularQuestion
     * @return Response
     */
    public function update(UpdatePopularQuestionRequest $request, PopularQuestion $popularQuestion)
    {
        $popularQuestion->update($request->validated());

        return redirect()->route('admin.popular-questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PopularQuestion $popularQuestion
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(PopularQuestion $popularQuestion)
    {
        $popularQuestion->delete();

        return back();
    }
}
