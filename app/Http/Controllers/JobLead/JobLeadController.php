<?php

namespace App\Http\Controllers\JobLead;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobLead\JobLeadRequest;
use App\Http\Resources\JobLeadResource;
use App\Services\JobLead\JobLeadService;

class JobLeadController extends Controller
{
    public function createJobLead(JobLeadRequest $request, JobLeadService $jobLeadService): JobLeadResource
    {

        $jobLead = $jobLeadService->createJobLead($request->validated());

        return new JobLeadResource($jobLead);
    }
}
