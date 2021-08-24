<?php

namespace App\Http\Resources;

use App\News;
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
            'opponent' => new OpponentResource($this->opponent),
            'play_datetime' => $this->play_datetime,
            'date' => date('d M Y', strtotime($this->play_datetime)),
            'day' => date('d', strtotime($this->play_datetime)),
            'month' => date('M', strtotime($this->play_datetime)),
            'time' => date('h:i A', strtotime($this->play_datetime)),
            'place' => $this->place,
            'latest_news' => $this->latestNews(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    protected function latestNews()
    {
        $news = News::take(4)->latest()->get();
        return NewsResource::collection($news);
    }
}
