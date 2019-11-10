<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CreateCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CompanyController extends Controller
{
    private $companyService;

    /**
     * CompanyController constructor.
     */
    public function __construct()
    {
        $this->companyService = new CompanyService();
    }

    /**
     * Shows the form for creating the instance.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('createCompany', Auth::user());

        return view('pages.companies.create');
    }

    public function show(Company $company)
    {
        $recentPosts = $company->posts()->latest()->paginate(5);

        $reportTypes = $company->reportTypes()->get();

        return view('pages.companies.show', compact('company', 'recentPosts', 'reportTypes'));
    }

    /**
     * @param CreateCompanyRequest $request
     * @return int
     */
    public function store(CreateCompanyRequest $request)
    {
        $data = $request->validated();

        $company = Auth::user()->company()->create($data);

        $this->companyService->handleUploadedPhoto($company, $request->logo);

        return redirect()->route('companies.show', ['company' => $company]);
    }
}
