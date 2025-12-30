<?php

namespace App\Services\Promotion;

use App\Models\Promotion;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;

class PromotionService extends Service
{

    public function __construct(Promotion $model)
    {
        return parent::__construct($model);
    }



    public function createPromotion(array $data)
    {
        return $this->create($data);
    }



    public function updatePromotion(int $id, array $data)
    {
        return $this->update($id, $data);
    }



    public function deletePromotion(int $id): bool
    {
        return $this->delete($id);
    }
}
