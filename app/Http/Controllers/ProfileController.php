<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileCreateRequest;
use App\Http\Resources\ProfileResource;
use App\Services\Profile\ProfileService;

class ProfileController extends Controller
{

   public function createProfile(ProfileCreateRequest $request , ProfileService $service): ProfileResource
   {

       $profile = $service->createOrUpdateProfile($request->validated());
       return new ProfileResource($profile);
   }
}
