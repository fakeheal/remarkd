<?php

namespace Database\Factories;

use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookmark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => Bookmark::$availableTypes['VIDEO'],
            'content' => $this->faker->imageUrl(),
            'is_public' => true,
        ];
    }

    public function image()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => Bookmark::$availableTypes['IMAGE'],
                'content' => $this->faker->imageUrl(),
            ];
        });
    }

    public function link()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => Bookmark::$availableTypes['LINK'],
                'content' => $this->faker->url,
            ];
        });
    }

    public function text()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => Bookmark::$availableTypes['TEXT'],
                'content' => $this->faker->paragraph,
            ];
        });
    }
}
