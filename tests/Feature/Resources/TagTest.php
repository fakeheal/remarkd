<?php

namespace Tests\Feature\Resources;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_creating_tag_with_missing_fields()
    {
        $response = $this->postJson('api/tags', [

        ]);

        $response->assertStatus(422);
    }

    public function test_creating_tag_with_valid_fields()
    {
        $response = $this->postJson('api/tags', [
            'name' => 'agile',
            'description' => 'testing tag description',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tags', ['name' => 'agile', 'description' => 'testing tag description']);
    }

    public function test_creating_tags_with_same_names()
    {
        $response = $this->postJson('api/tags', [
            'name' => 'agile',
            'description' => 'testing tag description',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('tags', ['name' => 'agile', 'description' => 'testing tag description']);

        $response = $this->postJson('api/tags', [
            'name' => 'agile',
            'description' => 'testing tag description',
        ]);

        $response->assertStatus(422);
    }

    public function test_list_tags()
    {
        $response = $this->get('api/tags');

        $response->assertStatus(200);
    }

    public function test_create_tag_and_see_it_in_listing()
    {
        $this->postJson('api/tags', [
            'name' => 'im a new tag',
        ]);

        $response = $this->get('api/tags');

        $response->assertJsonFragment(['name' => 'im a new tag', 'description' => null]);
    }

    public function test_update_tag_with_missing_fields()
    {
        $tag = Tag::factory()->create();

        $response = $this->putJson('api/tags/' . $tag->id, []);

        $response->assertStatus(422);
    }

    public function test_update_tag_with_same_name()
    {
        $tag = Tag::factory()->create();
        $response = $this->putJson('api/tags/' . $tag->id, ['name' => $tag->name]);
        $response->assertStatus(200);
    }

    public function test_update_with_already_existing_name()
    {
        $tag = Tag::factory()->create();
        $tag2 = Tag::factory()->create();

        $response = $this->putJson('api/tags/' . $tag2->id, ['name' => $tag->name]);
        $response->assertStatus(422);
    }

    public function test_update_tag_with_valid_fields()
    {
        $tag = Tag::factory()->create();
        $response = $this->putJson('api/tags/' . $tag->id, [
            'name' => 'new name for this test',
            'description' => 'new description for this test'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('tags', [
            'id' => $tag->id,
            'name' => 'new name for this test',
            'description' => 'new description for this test'
        ]);
    }
}
