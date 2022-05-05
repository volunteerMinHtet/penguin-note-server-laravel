<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Services\V1\NoteService;
use App\Traits\V1\ResponseApi;

class NoteController extends Controller
{
    use ResponseApi;

    protected NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function index()
    {
        $notes = $this->noteService->getAllNotes();
        return $this->successResponse('Successfully retrieved all notes', $notes);
    }
}
