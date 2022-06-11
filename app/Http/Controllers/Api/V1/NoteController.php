<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\V1\PublicNoteCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CreateNoteRequest;
use App\Services\V1\NoteService;
use App\Traits\V1\ResponseApi;

class NoteController extends Controller
{
    use ResponseApi;

    protected NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function getPrivateNotes()
    {
        return $this->noteService->getPublicNoteCollectionWithPaginate(30);
    }

    public function getPublicNotes()
    {
        return $this->noteService->getPrivateNoteCollectionWithPaginate(30);
    }


    public function store(CreateNoteRequest $request)
    {
        $note = $this->noteService->createANewNote($request);
        PublicNoteCreated::dispatch($note);

        return $this->successResponse('Successfully created a new note', $note, 201);
    }
}
