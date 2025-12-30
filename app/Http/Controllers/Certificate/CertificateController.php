<?php

namespace App\Http\Controllers\Certificate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Certificate\CertificateRequest;
use App\Http\Resources\CertificateResource;
use App\Services\Certificate\CertificateService;

class CertificateController extends Controller
{
    public function createCertificate(CertificateRequest $request , CertificateService $certificateService): CertificateResource
    {

        $certificate = $certificateService->createCertificate($request->validated());
        return new CertificateResource($certificate);
    }
}
