<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpertSearchResource extends JsonResource
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
            'structure' => $this->structure,
            'user' => new UserResource($this->user),
            'geographic_region' => $this->geographic_region,
            'address' => $this->address,
            'mobile' => $this->mobile,
            'tel' => $this->tel,
            'expert_domain' => $this->expert_domain,
            'created_at' => $this->created_at,
        ];
    }
}
