<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        $name = fake()->name();
        $company = fake()->company();

        return [
            'name' => $name,
            'name_index' => strtolower($name),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'company' => Str::limit(fake()->company(), 100),
            'company_index' => fn(array $attributes) => strtolower(Str::limit($attributes['company'], 100)),
            'notes' => fake()->sentence(),
        ];
    }
}
