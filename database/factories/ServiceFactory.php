<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $name = fake()->bs();

        return [
            'name' => Str::limit(fake()->name(), 100),
            'name_index' => strtolower($name),
            'description' => Str::limit(fake()->sentence(), 255),
            'price' => 100,
            'is_active' => true,
            'type' => fake()->randomElement(['one-time', 'subscription']),
        ];
    }
}
