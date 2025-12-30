<?php

namespace App\Services\JobLead;

use App\Models\JobLead;
use App\Services\Service;

class JobLeadService extends Service
{

    public function __construct(JobLead $model)
    {
        return parent::__construct($model);
    }

    public function createJobLead(array $data): JobLead
    {
        return $this->model->create($data);
    }


    public function updateJobLead(int $id, array $data): ?JobLead
    {
        return $this->update($id, $data);
    }


    public function deleteJobLead(int $id): bool
    {
        return $this->delete($id);
    }
}
