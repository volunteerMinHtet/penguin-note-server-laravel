<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'user' => new UserResource($this->user),
            'is_public' => $this->is_public,
            'theme' => [
                'name' => $this->theme_name,
                'background' => $this->background_color,
                'text' => $this->text_color,
            ],
            'posted_date_time' => $this->updated_at,
        ];
    }
}
