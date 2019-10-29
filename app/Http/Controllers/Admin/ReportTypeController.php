<?php

namespace App\Http\Controllers\Admin;

use App\Assets\ReportableModels;
use App\Http\Controllers\Controller;
use App\Models\ReportType;
use Illuminate\Http\Request;

class ReportTypeController extends Controller
{
    public function index()
    {
        $totalReportTypes = ReportType::count();

        $reportTypes = ReportType::paginate(50);

        return view('admins.pages.reportTypes.index', compact('reportTypes', 'totalReportTypes'));
    }

    public function create()
    {
        $models = ReportableModels::get();

        return view('admins.pages.reportTypes.create', compact('models'));
    }

    public function store(Request $request)
    {
        ReportType::create($request->all());

        return redirect()->route('admin.report-types.index');
    }

    public function edit(ReportType $reportType)
    {
        $models = ReportableModels::get();

        return view('admins.pages.reportTypes.edit', compact('reportType', 'models'));
    }

    public function update(Request $request, ReportType $reportType)
    {
        $reportType->update($request->all());

        return redirect()->route('admin.report-types.index');
    }

    public function destroy(ReportType $reportType)
    {
        $reportType->delete();

        return redirect()->route('admin.report-types.index');
    }
}
