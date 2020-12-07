<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VolunteerProfile extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->volunteer->address,
            'birthday' => $this->volunteer->birthday,

        ];
    }
}
