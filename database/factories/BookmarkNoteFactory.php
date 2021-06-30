<?php

namespace Database\Factories;

use App\Models\Bookmark;
use App\Models\BookmarkNote;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkNoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookmarkNote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bookmark = Bookmark::factory()->create();
        return [
            'content' => $this->faker->paragraph,
            'parent_id' => null,
            'bookmark_id' => $bookmark->id,
        ];
    }
}
