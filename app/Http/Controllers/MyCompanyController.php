<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Services\CompanyService;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyCompanyController extends Controller
{
    private $companyService;

    /**
     * MyCompanyController constructor.
     */
    public function __construct()
    {
        $this->companyService = new CompanyService();
    }

    /**
     * Shows the index page.
     *
     * @return Factory|View
     */
    public function index()
    {
        $company = Auth::user()->company;

        $postsQuery = $company->posts();

        $totalPosts = $postsQuery->count();

        $todayPosts = $postsQuery->where('created_at', '>=', Carbon::now()->startOfDay())->count();

        return view('pages.my-company.index', compact(
            'company',
            'totalPosts',
            'todayPosts'
        ));
    }

    /**
     * Shows the company.
     *
     * @return Factory|View
     */
    public function show()
    {
        $company = Auth::user()->company;

        return view('pages.my-company.show', compact('company'));
    }

    /**
     * @param UpdateCompanyRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateCompanyRequest $request)
    {
        $this->companyService->updateCompany(Auth::user()->company, $request);

        return back();
    }
}
