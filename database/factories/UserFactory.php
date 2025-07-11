<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'name_index' => strtolower($name),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'), // Par défaut
            'role' => 'user',
            'remember_token' => Str::random(10),
        ];
    }
}
