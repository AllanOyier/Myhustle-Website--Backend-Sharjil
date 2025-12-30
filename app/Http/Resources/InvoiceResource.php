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
            'e_wallet_number' => $this->e_wallet_number,
            'bank_account_holder_name' => $this->bank_account_holder_name,
            'bank_name' => $this->bank_name,
            'bank_account_number' => $this->bank_account_number,
            'bank_branch_number' => $this->bank_branch_number,
            'bank_swift_code' => $this->bank_swift_code,
            'data' => $this->data,
            'user' => UserRecource::make($this->whenLoaded('user')),
            'reciver' => UserRecource::make($this->whenLoaded('reciver')),
        ];
    }
}
