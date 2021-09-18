<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'dob' => $this->dob,
            'avatar' => 'http://localhost:8000/users/' . $this->avatar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
