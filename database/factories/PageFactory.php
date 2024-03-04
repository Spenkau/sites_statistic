<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    protected array $responseCodes = [200, 300, 400, 500];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => fake()->unique()->url(),
            'accessibility' => $this->responseCodes[rand(0, count($this->responseCodes) - 1)],
            'response_time' => rand(100, 10000)
        ];
    }
}
