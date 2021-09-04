<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketInfoResource extends JsonResource
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
            'cover_image' => 'http://localhost:8000/ticket-infos/' . $this->cover_image,
            'bg_image' => 'http://localhost:8000/ticket-infos/' . $this->bg_image,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'publish_date' => '3 Sep 2021',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
