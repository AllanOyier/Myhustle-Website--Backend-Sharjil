<?php

namespace App\Services\Catalogue;

use App\Models\ProductCatalogue;
use App\Services\Service;

class ProductCatalogueService extends Service
{
    public function __construct(ProductCatalogue $model)
    {
        return parent::__construct($model);
    }

    public function createProductCatalogue(array $data): ProductCatalogue
    {
        return $this->create($data);
    }

    public function updateProductCatalogue(int $id, array $data): ?ProductCatalogue
    {
        return $this->update($id, $data);
    }


    public function deleteProductCatalogue(int $id): bool
    {
        return $this->delete($id);
    }
}
