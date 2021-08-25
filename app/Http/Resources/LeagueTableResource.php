<?php

namespace App\Http\Resources;

use App\News;
use Illuminate\Http\Resources\Json\JsonResource;

class LeagueTableResource extends JsonResource
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
            'P' => $this->pwal,
            'W' => $this->win,
            'D' => $this->draw,
            'L' => $this->lose,
            'GF' => $this->GF,
            'GA' => $this->GA,
            'GD' => $this->GD,
            'pts' => $this->pts,
            'opponent' => new OpponentResource($this->opponent),
            'latest_news' => $this->getLatestNews(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    public function getLatestNews()
    {
        $news = News::take(4)->latest()->get();
        return NewsResource::collection($news);
    }
}
