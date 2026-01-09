<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'description' => $this->description,
            'status' => $this->status,
            'invoice_type' => $this->invoice_type,
            'data' => $this->data,
            'user' => UserRecource::make($this->whenLoaded('user')),
            'reciver' => UserRecource::make($this->whenLoaded('reciver')),
        ];
    }
}
