<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderByDesc('created_at')->paginate(50);

        return view('admins.pages.reports.index', compact('reports'));
    }

    public function show(Report $report)
    {
        if ($report->isNotViewed()) {
            $report->makeViewed();
        }
        $model = $report->model();

        return view('admins.pages.reports.show', compact('report', 'model'));
    }

    public function update(Report $report)
    {
        $report->makeNotViewed();

        return redirect()->route('admin.reports.index');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return back();
    }
}
