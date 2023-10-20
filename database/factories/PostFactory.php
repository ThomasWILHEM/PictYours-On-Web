<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->sentences(1, true),
            'image_path' => 'images/Heuv2SdAnL7g0VeqloJ5TxqdoxNRP9ZbDNvlpLbo.png'
        ];
    }
}