<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCompanyLogoController extends Controller
{
    public function destroy()
    {
        $company = Auth::user()->company;

        $this->authorize('deleteLogo', $company);

        $company->getFirstMedia('logo')->delete();

        return back();
    }
}
