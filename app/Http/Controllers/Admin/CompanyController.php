<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Role;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $totalCompanies = Company::count();
        $companies = Company::paginate(50);

        return view('admins.pages.sellers.index', compact('companies', 'totalCompanies'));
    }

    public function update(User $user)
    {
        $user->changeRoleTo(Role::USER);

        return back();
    }
}
