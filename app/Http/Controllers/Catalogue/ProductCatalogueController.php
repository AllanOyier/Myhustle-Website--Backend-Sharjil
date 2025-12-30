<?php

namespace App\Http\Controllers\Catalogue;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogue\ProductCatalogueRequest;
use App\Http\Resources\Catalogue\ProductCatalogueResource;
use App\Services\Catalogue\ProductCatalogueService;
use Illuminate\Http\Request;

class ProductCatalogueController extends Controller
{
      public function createProductCatalogue(ProductCatalogueRequest $request, ProductCatalogueService $catalogueService): ProductCatalogueResource
    {
        $catalogue = $catalogueService->createProductCatalogue($request->validated());

        return new ProductCatalogueResource($catalogue);
    }
}
