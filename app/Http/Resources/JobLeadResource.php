<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobLeadResource extends JsonResource
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
            'to_name' => $this->to_name,
            'to_mobile' => $this->to_mobile,
            'to_email' => $this->to_email,
            'from_name' => $this->from_name,
            'from_mobile' => $this->from_mobile,
            'from_email' => $this->from_email,
            'title' => $this->title,
            'date' => $this->date,
            'time' => $this->time,
            'location' => $this->location,
            'description' => $this->description,
            'rate' => $this->rate,
            'image1' => $this->image1,
            'image2' => $this->image2,
            'from_time' => $this->from_time,
            'to_time' => $this->to_time,
        ];
    }
}
