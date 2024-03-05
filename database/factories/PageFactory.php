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
        $value = 1;

        return [
            'url' => fake()->unique()->url(),
            'threshold_speed' => rand(200,10000),
//            'detail_id' => $value++,
            'page_id' => null,
            'comment' => fake()->text(100)
        ];
    }
}
