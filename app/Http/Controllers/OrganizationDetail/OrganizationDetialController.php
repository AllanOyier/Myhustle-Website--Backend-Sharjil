<?php

namespace App\Http\Controllers\OrganizationDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationDetail\OrganizationDetialRequest;
use App\Http\Resources\OrganizationDetialResource;
use App\Services\OrganizationDetail\OrganizationDetailService;
use Illuminate\Http\Request;

class OrganizationDetialController extends Controller
{
    public function createOrganizationDetail(OrganizationDetialRequest $request, OrganizationDetailService $organizationDetailService): OrganizationDetialResource

    {
        $data = $organizationDetailService->createOrUpdateOrganizationDetail($request->validated());
        return new OrganizationDetialResource($data);
    }
}
