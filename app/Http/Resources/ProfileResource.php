<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'user_id' => $this->user_id,
            'profile_img' => $this->profile_img,
            'profile_logo_img' => $this->profile_logo_img,
            'profile_background_img' => $this->profile_background_img,
            'tagline' => $this->tagline,
            'about' => $this->about
        ];
    }
}
