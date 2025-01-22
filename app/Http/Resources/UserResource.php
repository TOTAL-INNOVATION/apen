<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'birthplace' => $this->birthplace,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'identity_photo' => $this->identity_photo,
            'verified_at' => $this->email_verified_at,
            'avatar' => $this->avatar,
            'role' => $this->role,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
