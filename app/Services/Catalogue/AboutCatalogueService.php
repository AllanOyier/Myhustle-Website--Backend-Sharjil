<?php

namespace App\Services\Catalogue;

use App\Models\AboutCatalogue;
use App\Services\Service;

class AboutCatalogueService extends Service
{

    public function __construct(AboutCatalogue $model)
    {
        return parent::__construct($model);
    }


    public function getAboutCatalogue($user_id): ?AboutCatalogue
    {
        return $this->query()->where('user_id', $user_id)->firstOrFail();
    }




    public function createAboutCatalogue(array $data): AboutCatalogue
    {
        return $this->createOrUpdate(['user_id' => $data['user_id']], $data);
    }
}
