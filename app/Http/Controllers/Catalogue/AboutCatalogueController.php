<?php

namespace App\Http\Controllers\Catalogue;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogue\AboutCatalogueRequest;
use App\Http\Resources\Catalogue\AboutCatalogueResource;
use App\Services\Catalogue\AboutCatalogueService;
use Illuminate\Http\Request;

class AboutCatalogueController extends Controller
{

    public function getAboutCatalogue(Request $request, AboutCatalogueService $catalogueService): AboutCatalogueResource
    {

        $catalogue = $catalogueService->getAboutCatalogue($request->user_id);

        return new AboutCatalogueResource($catalogue);
    }

    public function createAboutCatalogue(AboutCatalogueRequest $request, AboutCatalogueService $catalogueService): AboutCatalogueResource
    {
        $catalogue = $catalogueService->createAboutCatalogue($request->validated());

        return new AboutCatalogueResource($catalogue);
    }
}
