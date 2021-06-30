<?php

namespace Tests\Feature\Resources;

use App\Models\Bookmark;
use App\Models\BookmarkNote;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookmarkNoteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_adding_note_with_invalid_fields()
    {
        $bookmark = Bookmark::factory()->create();

        $response = $this->postJson('api/bookmarks/' . $bookmark->id . '/notes', [

        ]);

        $response->assertStatus(422);
    }

    public function test_adding_note_with_valid_fields()
    {
        $bookmark = Bookmark::factory()->create();
        $response = $this->postJson('api/bookmarks/' . $bookmark->id . '/notes', [
            'content' => 'this bookmark is also extraordinary, because it features what is unknown to the general public',
            'parent_id' => null,
        ]);

        $this->assertDatabaseHas('bookmark_notes', [
            'content' => 'this bookmark is also extraordinary, because it features what is unknown to the general public',
            'bookmark_id' => $bookmark->id
        ]);
        $response->assertStatus(201);
    }

    public function test_adding_note_with_invalid_parent()
    {
        $bookmark = Bookmark::factory()->create();
        $bookmarkNote = BookmarkNote::factory()->create();
        $response = $this->postJson('api/bookmarks/' . $bookmark->id . '/notes', [
            'content' => 'this bookmark is also extraordinary, because it features what is unknown to the general public',
            'parent_id' => $bookmarkNote->id + 20,
        ]);

        $response->assertStatus(422);
    }

    public function test_adding_note_with_valid_parent()
    {
        $bookmark = Bookmark::factory()->create();
        $bookmarkNote = BookmarkNote::factory()->create();
        $response = $this->postJson('api/bookmarks/' . $bookmark->id . '/notes', [
            'content' => 'this bookmark is also extraordinary, because it features what is unknown to the general public',
            'parent_id' => $bookmarkNote->id,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('bookmark_notes', [
            'content' => 'this bookmark is also extraordinary, because it features what is unknown to the general public',
            'bookmark_id' => $bookmark->id,
            'parent_id' => $bookmarkNote->id,
        ]);
    }
}
