<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocietyResource extends JsonResource
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
            'name' => $this->name,
            'commercial_name' => $this->commercial_name,
            'founded_at' => $this->founded_at,
            'capital' => $this->capital,
            'legal_status' => $this->legal_status,
            'status_file' => $this->status_file,
            'staff_number' => $this->staff_number,
            'salaried_technical_staff' => $this->salaried_technical_staff,
            'salaried_administrative_staff' => $this->salaried_administrative_staff,
        ];
    }
}
