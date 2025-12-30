<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationDetialResource extends JsonResource
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
            'cooperative' => $this->cooperative,
            'sub_cooperative' => $this->sub_cooperative,
            'contract' => $this->contract,
            'sub_contract' => $this->sub_contract,
            'area_of_focous' => $this->area_of_focous,
            'industry_activity_survey_detail' => $this->industry_activity_survey_detail,
            'industry_activity_survey_vision' => $this->industry_activity_survey_vision,
            'referal' => $this->referal,
            'referal_number' => $this->referal_number,
            'data_use' => $this->data_use
        ];
    }
}
