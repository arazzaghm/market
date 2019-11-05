<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function deleteLogo(User $user, Company $company)
    {
        return $company->getFirstMedia('logo')
            ? Response::allow()
            : Response::deny();
    }
}
