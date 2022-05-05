<?php

namespace App\Http\Services\V1;

use App\Http\Repositories\V1\Interfaces\NoteInterface;

class NoteService
{
    protected NoteInterface $noteInterface;

    public function __construct(NoteInterface $noteInterface)
    {
        $this->noteInterface = $noteInterface;
    }

    public function getAllNotes()
    {
        return $this->noteInterface->getCollection();
    }
}
