<?php

namespace App\Services\Catalogue;

use App\Models\Catalogue;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;

class CatalogueService extends Service
{

    public function __construct(Catalogue $model)
    {
        return parent::__construct($model);
    }

    public function createCatalogue(array $data): Catalogue
    {
        return $this->create($data);
    }

    public function updateCatalogue(int $id, array $data): ?Catalogue
    {
        return $this->update($id, $data);
    }


    public function deleteCatalogue(int $id): bool
    {
        return $this->delete($id);
    }
}
