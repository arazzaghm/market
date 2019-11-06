<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\UpdateCompanyRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCompanyController extends Controller
{
    public function index()
    {
        $company = Auth::user()->company;

        $postsQuery  = $company->posts();

        $totalPosts = $postsQuery->count();

        $todayPosts = $postsQuery->where('created_at', '>=', Carbon::now()->startOfDay())->count();

        return view('pages.my-company.index', compact(
            'company',
            'totalPosts',
            'todayPosts'
        ));
    }

    public function show()
    {
        $company = Auth::user()->company;

        return view('pages.my-company.show', compact('company'));
    }

    public function update(UpdateCompanyRequest $request)
    {
        $data = $request->validated();
        unset($data['logo']);

        Auth::user()->company->update($data);

        $company = Auth::user()->company;

        if ($request->hasFile('logo') && $company->hasMedia('logo')) {
            $company->getFirstMedia('logo')->delete();
            $company->addMedia($request->logo)->toMediaCollection('logo');
        } elseif ($request->hasFile('logo')) {
            $company->addMedia($request->logo)->toMediaCollection('logo');
        }

        return back();
    }
}
