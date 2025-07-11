<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AiInsights;

class AiInsightFactory extends Factory
{
    protected $model = AiInsights::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'summary' => fake()->paragraph(),
            'data' => [
                'source' => 'auto-generated',
                'context' => fake()->words(3, true),
                'confidence' => fake()->randomFloat(2, 0.7, 0.99),
            ],
        ];
    }
}
