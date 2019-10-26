<?php

namespace App\Http\Controllers;

use App\Http\Requests\Report\CreateReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(CreateReportRequest $request, $model)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Report::create($data);

        return back();
    }
}
