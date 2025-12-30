<?php

namespace App\Services\Profile;

use App\Models\Profile;
use App\Services\Service;

class ProfileService extends Service
{

    public function __construct(Profile $model)
    {
        parent::__construct($model);
    }

    public function createOrUpdateProfile(array $data): Profile
    {
        return $this->createOrUpdate(['user_id' => $data['user_id']], $data);
    }
}
