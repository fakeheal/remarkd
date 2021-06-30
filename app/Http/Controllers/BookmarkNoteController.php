<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookmarkNotes\CreateNote;
use App\Http\Requests\BookmarkNotes\UpdateNote;
use App\Http\Resources\BookmarkNoteResource;
use App\Http\Resources\BookmarkResource;
use App\Models\Bookmark;
use App\Models\BookmarkNote;

class BookmarkNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {

        return BookmarkNoteResource::collection(BookmarkNote::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return redirect()->route('notes.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Bookmark $bookmark
     * @param CreateNote $request
     * @return BookmarkNoteResource
     */
    public function store(Bookmark $bookmark, CreateNote $request)
    {

        $bookmarkNote = $bookmark->notes()->create([
            'content' => $request->input('content'),
            'parent_id' => $request->input('parent_id')
        ]);

        return new BookmarkNoteResource($bookmarkNote);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return BookmarkNoteResource
     */
    public function show($id)
    {
        return new BookmarkNoteResource(BookmarkNote::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        return redirect()->route('notes.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNote $request
     * @param int $id
     * @return BookmarkNoteResource
     */
    public function update(UpdateNote $request, $id)
    {
        $note = BookmarkNote::findOrFail($id);
        $note->update([
            'content' => $request->input('content'),
            'parent_id' => $request->input('parent_id')
        ]);
        return new BookmarkNoteResource(BookmarkNote::findOrFail($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
