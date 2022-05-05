<?php

namespace App\Http\Repositories\V1\Interfaces;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface NoteInterface
{
    public function getCollection(): AnonymousResourceCollection;
    // public function store(): Note;
}
