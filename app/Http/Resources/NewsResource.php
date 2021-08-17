<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class NewsResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'image' => public_path() . "/news/" . $this->image,
            'publish_date' => $this->publish_date($this->created_at),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    protected function publish_date($date)
    {
        return $date->toFormattedDateString();
    }
}
