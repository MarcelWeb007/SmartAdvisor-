<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        $name = fake()->company();
        $type = fake()->randomElement(['freelance', 'startup', 'agency']);
        $industry = fake()->randomElement(['tech', 'design', 'finance', 'adult']);

        return [
            'name' => $name,
            'name_index' => strtolower($name),
            'type' => $type,
            'type_index' => strtolower($type),
            'industry' => $industry,
            'industry_index' => strtolower($industry),
            'logo_path' => null,
        ];
    }
}
