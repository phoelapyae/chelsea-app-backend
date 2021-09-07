<?php

namespace App\Http\Resources;

use App\FootballMatch;
use App\MatchDayPackage;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'title' => $this->title,
            'price' => $this->price,
            'limit_count' => $this->limit_count,
            'cover_image' => 'http://localhost:8000/packages/' . $this->cover_image,
            'bg_image' => 'http://localhost:8000/packages/' . $this->bg_image,
            'expanded' => $this->expanded,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'matches' => $this->latestMatches($this->id),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    protected function latestMatches($id)
    {
        $package = MatchDayPackage::find($id);
        $matches = $package->matches()->take(3)->get();
        return MatchResource::collection($matches);
    }
}
