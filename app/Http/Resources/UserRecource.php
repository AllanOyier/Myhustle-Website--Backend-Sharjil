<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRecource extends JsonResource
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
            'name' => $this->name ?? $this->org_name, // handles both individual and org
            'email' => $this->email,
            'type_of_user' => $this->type_of_user,
            'created_at' => $this->created_at->toDateTimeString(),
            'profile' => ProfileResource::make($this->whenLoaded('profile')),
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'promotions' => PromotionResource::collection($this->whenLoaded('promotions')),
            'certificates' => CertificateResource::collection($this->whenLoaded('certificates')),
            'JobLeads' => JobLeadResource::collection($this->whenLoaded('JobLeads')),
            'Invoices' => InvoiceResource::collection($this->whenLoaded('invoices')),
        ];
    }
}
