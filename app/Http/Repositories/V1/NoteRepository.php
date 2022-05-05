<?php

namespace App\Http\Repositories\V1;

use App\Http\Repositories\V1\Interfaces\NoteInterface;
use App\Http\Resources\V1\NoteResource;
use App\Models\Note;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NoteRepository implements NoteInterface
{
    public function getCollection(): AnonymousResourceCollection
    {
        return NoteResource::collection(Note::all());
    }

    // public function store(): Note
    // {

    // }
}
