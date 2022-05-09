<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CreateNoteRequest;
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
        $notes = $this->noteService->getAllNoteCollection();
        return $this->successResponse('Successfully retrieved all notes', $notes);
    }

    public function store(CreateNoteRequest $request)
    {
        $note = $this->noteService->createANewNote($request);
        return $this->successResponse('Successfully created a new note', $note, 201);
    }
}
