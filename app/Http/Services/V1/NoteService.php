<?php

namespace App\Http\Services\V1;

use App\Http\Resources\V1\NoteResource;
use App\Models\Note;

class NoteService
{
    public function getNoteCollection()
    {
        return NoteResource::collection(Note::all());
    }
}
