<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => fake()->unique()->url(),
            'threshold_speed' => rand(200,10000),
            'page_id' => null,
            'site_id' => rand(1, 30),
            'comment' => fake()->text(100)
        ];
    }
}
