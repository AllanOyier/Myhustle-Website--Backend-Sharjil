<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotion\PromotionRequest;
use App\Http\Resources\PromotionResource;
use App\Services\Promotion\PromotionService;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function createPromotion(PromotionRequest $request, PromotionService $promotionService): PromotionResource
    {
        $promotion = $promotionService->createPromotion($request->validated());

        return new PromotionResource($promotion);
    }
}
