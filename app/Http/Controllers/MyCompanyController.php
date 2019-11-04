<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCompanyController extends Controller
{
    public function index()
    {
        $company = Auth::user()->company;
        return view('pages.my-company.show', ['company' => $company]);
    }
}
