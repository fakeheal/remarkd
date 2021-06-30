<?php

namespace Tests\Feature\Resources;

use App\Models\Bookmark;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookmarkTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_creating_bookmark_with_missing_fields()
    {
        $response = $this->postJson('api/bookmarks', [

        ]);

        $response->assertStatus(422);
    }

    public function test_creating_bookmark_with_valid_fields_but_missing_tags()
    {
        $response = $this->postJson('api/bookmarks', [
            'type' => Bookmark::$availableTypes['VIDEO'],
            'content' => 'https://www.youtube.com/watch?v=vuCQaLAk03I',
            'is_public' => true,
            'tags' => []
        ]);

        $response->assertStatus(422);
    }

    public function test_creating_bookmark_with_valid_fields()
    {
        $tag = Tag::factory()->create();
        $response = $this->postJson('api/bookmarks', [
            'type' => Bookmark::$availableTypes['VIDEO'],
            'content' => 'https://www.youtube.com/watch?v=vuCQaLAk03I',
            'is_public' => true,
            'tags' => [
                ['id' => $tag->id, 'name' => $tag->name]
            ]
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('bookmarks', ['content' => 'https://www.youtube.com/watch?v=vuCQaLAk03I']);
    }

    public function test_list_bookmarks()
    {
        $response = $this->get('api/bookmarks');

        $response->assertStatus(200);
    }

    public function test_create_bookmark_and_see_it_in_listing()
    {
        $tag = Tag::factory()->create();
        $this->postJson('api/bookmarks', [
            'type' => Bookmark::$availableTypes['VIDEO'],
            'content' => 'https://www.youtube.com/watch?v=vuCQaLAk03I',
            'is_public' => true,
            'tags' => [
                ['id' => $tag->id, 'name' => $tag->name]
            ]
        ]);
        $response = $this->get('api/bookmarks');

        $response->assertJsonFragment(['content' => 'https://www.youtube.com/watch?v=vuCQaLAk03I']);
    }

    public function test_update_bookmark_with_missing_fields()
    {
        $bookmark = Bookmark::factory()->create();

        $response = $this->putJson('api/tags/' . $bookmark->id, []);

        $response->assertStatus(422);
    }

    public function test_update_bookmark_with_valid_fields()
    {
        $tag = Tag::factory()->create();
        $bookmark = Bookmark::factory()->create();
        $response = $this->putJson('api/bookmarks/' . $bookmark->id, [
            'type' => Bookmark::$availableTypes['VIDEO'],
            'content' => 'https://www.youtube.com/watch?v=vuCQaLAk03I',
            'is_public' => true,
            'tags' => [
                ['id' => $tag->id, 'name' => $tag->name]
            ]
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('bookmarks', [
            'id' => $bookmark->id,
            'type' => Bookmark::$availableTypes['VIDEO'],
            'content' => 'https://www.youtube.com/watch?v=vuCQaLAk03I',
        ]);
    }
}
