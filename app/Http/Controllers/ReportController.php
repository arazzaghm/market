<?php

namespace App\Http\Controllers;

use App\Http\Requests\Report\CreateReportRequest;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Stores report.
     *
     * @param CreateReportRequest $request
     * @param $model
     * @return RedirectResponse
     */
    public function store(CreateReportRequest $request, $model)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Report::create($data);

        return back();
    }
}
