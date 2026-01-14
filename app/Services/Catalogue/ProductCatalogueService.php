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

    public function getProductCatalogue($user_id): ProductCatalogue
    {
        return $this->query()->where('user_id', $user_id)->firstOrFail();
    }

    public function createProductCatalogue(array $data): ProductCatalogue
    {
        $userId = $data['user_id'];
        $newContent = $data['content'] ?? [];



        // Fetch existing catalogue or create new
        $catalogue = $this->query()->firstOrNew(['user_id' => $userId]);
        $content = $catalogue->content ?? [];

        // Loop through the sent content array

        if ($newContent) {
            foreach ($newContent as $index => $product) {
                if (!$product) continue; // skip nulls if frontend sends gaps

                // Update or create the product
                $content[$index] = $product;
            }
        }

        ksort($content); // optional: sort by index

        if (isset($data['product'])) {
            $catalogue->product = $data['product'];
        }
        if (isset($data['description'])) {
            $catalogue->description = $data['description'];
        }
        if (isset($data['special_product'])) {
            $catalogue->special_product = $data['special_product'];
        }
        $catalogue->content = $content;
        $catalogue->save();

        return $catalogue;
    }



    public function deleteProductCatalogue(int $id): bool
    {
        return $this->delete($id);
    }
}
