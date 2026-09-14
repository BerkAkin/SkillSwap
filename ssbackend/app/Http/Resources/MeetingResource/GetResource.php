<?php

namespace App\Http\Resources\MeetingResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           'status'=> $this->status,
           'date'=>$this->date,
           'meeting_type'=> $this->meeting_type_id,
           'offerer_id'=>$this->offerer_id,
           'adverter_id'=>$this->adverter_id,
           'adverter_approval'=>$this->adverter_approval,
           'offerer_approval'=>$this->offerer_approval,
        ];
    }
}
