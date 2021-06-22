<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bookmarks\CreateBookmark;
use App\Http\Requests\Bookmarks\UpdateBookmark;
use App\Http\Resources\BookmarkResource;
use App\Models\Bookmark;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return BookmarkResource::collection(Bookmark::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create()
    {
        return redirect()->route('bookmarks.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBookmark $request
     * @return BookmarkResource
     */
    public function store(CreateBookmark $request)
    {
        $bookmark = Bookmark::create([
            'type' => $request->input('type'),
            'content' => $request->input('content'),
            'is_public' => $request->input('is_public'),
            'self_destruct_at' => $request->input('self_destruct_at'),
        ]);

        $bookmark->tags()->sync($request->input('tags.*.id'));

        return new BookmarkResource($bookmark);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('bookmarks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function edit($id)
    {
        return redirect()->route('bookmarks.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBookmark $request
     * @param int $id
     * @return BookmarkResource
     */
    public function update(UpdateBookmark $request, $id)
    {
        $bookmark = Bookmark::findOrFail($id);

        $bookmark->update([
            'type' => $request->input('type'),
            'content' => $request->input('content'),
            'is_public' => $request->input('is_public'),
            'self_destruct_at' => $request->input('self_destruct_at'),
        ]);

        $bookmark->tags()->sync($request->input('tags.*.id'));

        return new BookmarkResource($bookmark);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
