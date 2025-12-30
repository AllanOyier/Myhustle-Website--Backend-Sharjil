<?php

namespace App\Http\Controllers\Catalogue;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogue\CatalogueRequest;
use App\Http\Resources\Catalogue\CatalogueResource;
use App\Services\Catalogue\CatalogueService;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function createCatalogue(CatalogueRequest $request, CatalogueService $catalogueService): CatalogueResource
    {
        $catalogue = $catalogueService->createCatalogue($request->validated());

        return new CatalogueResource($catalogue);
    }
}
