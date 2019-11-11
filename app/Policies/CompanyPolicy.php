<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    use HandlesAuthorization;


    /**
     * Check is user can create company.
     *
     * @param User $user
     * @param Company $company
     * @return Response
     */
    public function create(User $user, Company $company)
    {
        return !$user->hasCompany()
            ? Response::allow()
            : Response::deny(trans('response.company.deny.create'));
    }
    /**
     * Checks if logo can be deleted.
     *
     * @param User $user
     * @param Company $company
     * @return Response
     */
    public function deleteLogo(User $user, Company $company)
    {
        return $company->getFirstMedia('logo')
            ? Response::allow()
            : Response::deny();
    }
}
