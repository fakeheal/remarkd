<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\CreateTag;
use App\Http\Requests\Tags\UpdateTag;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return redirect()->route('tags.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return TagResource
     */
    public function store(CreateTag $request)
    {
        $tag = Tag::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return new TagResource($tag);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        return redirect()->route('tags.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return TagResource
     */
    public function update(UpdateTag $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return new TagResource($tag);
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
