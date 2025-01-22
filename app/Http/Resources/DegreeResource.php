<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DegreeResource extends JsonResource
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
            'level' => $this->level,
            'level_precision' => $this->level_precision,
            'years_of_experience' => $this->years_of_experience,
            'started_at' => $this->started_at,
            'file' => $this->file,
        ];
    }
}
