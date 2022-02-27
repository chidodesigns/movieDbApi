<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
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
            'data' => [
                'movie_id' => $this->id,
                'title' => $this->title,
                'director' => $this->director,
                'writers' => $this->writers,
                'stars' => $this->stars,
                'synopsis' => $this->synopsis,
                'storyline' => $this->storyline,
                'last_updated' => $this->updated_at->diffForHumans(),
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];

    }
}
