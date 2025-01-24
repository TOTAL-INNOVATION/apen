<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApprovalResource extends JsonResource
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
            'commercial_register' => $this->commercial_register,
            'country_of_residence' => $this->country_of_residence,
            'single_tax_form' => $this->single_tax_form,
            'geographic_region' => $this->geographic_region,
            'region' => $this->region,
            'address' => $this->address,
            'province' => $this->province,
            'mailbox' => $this->mailbox,
            'tel' => $this->tel,
            'mobile' => $this->mobile,
            'website' => $this->website,
            'fax' => $this->fax,
            'expert_status' => $this->expert_status,
            'has_been_public_agent' => $this->has_been_public_agent,
            'total_sectors' => $this->total_sectors,
            'association' => $this->association,
            'category' => $this->category,
            'activity_sector' => $this->activity_sector,
            'status_in_sector' => $this->status_in_sector,
            'signature' => $this->signature,
            'cv' => $this->cv,
            'status' => $this->status,
            'is_paid' => $this->is_paid,
            'user' => new UserResource($this->user),
            'created_at' => $this->created_at,

            ...($request->routeIs('demandes-d-agrement.show') ? [

                'degree' => new DegreeResource($this->degree),
                'trainings' => TrainingResource::collection($this->trainings),
                'certificates' => CertificateResource::collection($this->certificates),
                'society' => new SocietyResource($this->society),
                'associates' => AssociateResource::collection($this->associates),
                'domains' => DomainResource::collection($this->domains),
                'attachments' => AttachmentResource::collection($this->attachments),

            ] : [])
        ];
    }
}
