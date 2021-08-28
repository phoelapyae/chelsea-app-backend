<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamTypeResource extends JsonResource
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
            'active' => $this->setActive($this->id),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    public function setActive($id)
    {
        return $id === 1 ? true : false;
    }
}
