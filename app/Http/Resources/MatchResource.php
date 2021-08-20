<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
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
            'competition' => $this->competition,
            'opponent' => $this->opponent,
            'play_datetime' => $this->play_datetime,
            'place' => $this->place,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
