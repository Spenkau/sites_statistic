<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
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
            'site_id' => null,
            'comment' => fake()->text(100)
        ];
    }
}
