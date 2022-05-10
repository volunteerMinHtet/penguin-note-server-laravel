<?php

namespace App\Http\Services\V1;

use App\Http\Requests\V1\CreateNoteRequest;
use App\Http\Resources\V1\Collection\NoteCollection;
use App\Http\Resources\V1\NoteResource;
use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NoteService
{
    public function getAllNoteCollection(): NoteCollection
    {
        return new NoteCollection(Note::all());
    }

    public function getNoteCollectionWithPaginate($limit = 10): NoteCollection
    {
        return new NoteCollection(Note::paginate($limit));
    }

    public function createANewNote(CreateNoteRequest $request): NoteResource
    {
        $note = new Note();
        $note->user_id = auth()->user()->id;
        $note->title = $request->title;
        $note->body = $request->body;
        $note->is_public = $request->is_public;

        if ($request->has('image')) {
            if ($request->is_public) {
                $note->image =   $this->storeNotedImageInPublic($request->image);
            } else {
                $note->image =  $this->storeNotedImageInPrivate($request->image);
            }
        }
        $note->save();
        return new NoteResource($note);
    }

    public function storeNotedImageInPublic($image): string
    {
        // store image file in public storage
        return 'path/to/public/storage/image';
    }

    public function storeNotedImageInPrivate($image): string
    {
        // store image file in private storage
        return 'path/to/private/storage/image';
    }
}
