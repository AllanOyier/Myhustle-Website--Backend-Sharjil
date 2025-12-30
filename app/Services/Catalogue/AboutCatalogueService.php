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

    public function createAboutCatalogue(array $data): AboutCatalogue
    {
        return $this->create($data);
    }

    public function updateAboutCatalogue(int $id, array $data): ?AboutCatalogue
    {
        return $this->update($id, $data);
    }


    public function deleteAboutCatalogue(int $id): bool
    {
        return $this->delete($id);
    }
}
