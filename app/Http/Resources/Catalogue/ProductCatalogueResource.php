<?php

namespace App\Http\Resources\Catalogue;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCatalogueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product' => $this->product,
            'description' => $this->description,
            'content' => $this->content,
            'special_product' => $this->special_product,
        ];
    }
}
