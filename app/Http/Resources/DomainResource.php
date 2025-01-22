<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
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
            'type' => $this->type,
            'rank' => $this->rank,
            'first_subdomain' => $this->first_subdomain,
            'second_subdomain' => $this->second_subdomain,
            'third_subdomain' => $this->third_subdomain,
        ];
    }
}
