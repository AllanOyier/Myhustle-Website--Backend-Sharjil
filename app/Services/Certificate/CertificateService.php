<?php

namespace App\Services\Certificate;

use App\Models\Certificate;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;

class CertificateService extends Service
{

    public function __construct(Certificate $model)
    {
        parent::__construct($model);
    }




    public function createCertificate(array $data): Certificate
    {
        return $this->create($data);
    }

    public function updateCertificate(int $id, array $data): Certificate
    {
        return $this->update($id, $data);
    }


    public function deleteCertificate(int $id): bool
    {
        return $this->delete($id);
    }
}
