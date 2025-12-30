<?php

namespace App\Services\OrganizationDetail;

use App\Models\OrganizationDetail;
use App\Services\Service;

class OrganizationDetailService extends Service
{
    public function __construct(OrganizationDetail $model)
    {
        parent::__construct($model);
    }

    public function createOrUpdateOrganizationDetail(array $data): OrganizationDetail
    {
        return $this->createOrUpdate(['user_id' => $data['user_id']], $data);
    }
}
