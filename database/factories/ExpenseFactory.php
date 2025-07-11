<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Expense;

class ExpenseFactory extends Factory
{
    protected $model = Expense::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'amount' => fake()->randomFloat(2, 30, 300),
            'category' => fake()->randomElement(['utilities', 'office', 'supplies']),
            'expense_date' => fake()->dateTimeBetween('-3 months', 'now'),
            'notes' => fake()->sentence(),
        ];
    }
}
