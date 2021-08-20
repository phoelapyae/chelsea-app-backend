<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'avater' => public_path() . "/players/" . $this->avatar,
            'number' => $this->number,
            'date_of_birth' => $this->date_of_birth,
            'birthplace' => $this->birthplace,
            'height' => $this->height,
            'weight' => $this->weight,
            'biography' => $this->biography,
            'position' => $this->position,
            'workType' => $this->workType,
            'teamType' => $this->teamType,
            'nation' => $this->nation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
