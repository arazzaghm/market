<?php

namespace App\Services;

use App\Models\Company;
use App\Traits\UploadPhotoTrait;

class CompanyService
{
    use UploadPhotoTrait;

    private $object;

    public function handleUploadedPhoto(Company $company, $photo)
    {
        $this->object = $company;

        $this->upload($photo, 'logo');
    }
}
