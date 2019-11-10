<?php

namespace App\Services;

use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use App\Traits\UploadPhotoTrait;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CompanyService
{
    use UploadPhotoTrait;

    private $object;

    /**
     * Handles uploaded photo.
     *
     * @param Company $company
     * @param $photo
     */
    public function handleUploadedPhoto(Company $company, $photo)
    {
        $this->object = $company;

        $this->upload($photo, 'logo');
    }

    public function updateCompany(Company $company, UpdateCompanyRequest $request)
    {
        $data = $request->validated();
        unset($data['logo']);

        $company->update($data);

        $this->handleUploadedPhoto($company, $request->logo);
    }
}
