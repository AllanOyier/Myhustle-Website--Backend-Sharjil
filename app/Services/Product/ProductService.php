<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;

class ProductService extends Service{

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }




    public function createProduct(array $data): Product
    {
        return $this->create($data);
    }

    public function updateProduct(int $id, array $data): ?Product
    {
        return $this->update($id, $data);
    }


    public function deleteProduct(int $id): bool
    {
        return $this->delete($id);
    }
}
