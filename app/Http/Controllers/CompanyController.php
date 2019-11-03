<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CreateCompanyRequest;
use App\Models\Company;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CompanyController extends Controller
{
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
        return view('pages.companies.show', compact('company'));
    }

    /**
     * @param CreateCompanyRequest $request
     * @return int
     */
    public function store(CreateCompanyRequest $request)
    {
        $data = $request->validated();

        $company = Auth::user()->company()->create($data);

        if ($request->hasFile('logo')) {
            $company->addMedia($request->logo)->toMediaCollection('logo');
        }

        return redirect()->route('companies.show', ['company' => $company]);
    }
}
