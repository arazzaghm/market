<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCompanyLogoController extends Controller
{
    /**
     * Destroys company logo.
     *
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy()
    {
        $company = Auth::user()->company;

        $this->authorize('deleteLogo', $company);

        $company->getFirstMedia('logo')->delete();

        return back();
    }
}
