<?php

namespace App\Http\Resources\V1\Collection;

use App\Http\Resources\V1\NoteResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NoteCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'message' => 'Successfully retrieved notes',
            'data' => $this->collection,
        ];
    }
}
