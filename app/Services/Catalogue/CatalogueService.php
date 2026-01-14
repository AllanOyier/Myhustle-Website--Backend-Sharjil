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

    public function getCatalogue($user_id): ?Catalogue
    {
        return $this->query()->where('user_id', $user_id)->firstOrFail();
    }


    public function createCatalogue(array $data): Catalogue
    {
        return $this->createOrUpdate(['user_id' => $data['user_id']], $data);
    }

    public function deleteCatalogue(int $id): bool
    {
        return $this->delete($id);
    }
}
