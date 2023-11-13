<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TutorialDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'featured_image' =>  asset('storage/uploads/tutorials/'.$this->featured_image),
            'secondary_image' =>  asset('storage/uploads/tutorials/'.$this->secondary_image),
            'primary_content' => $this->primary_content,
            'secondary_content' => $this->secondary_content,
            'youtube_link' => $this->youtube_link,
        ];
    }
}
