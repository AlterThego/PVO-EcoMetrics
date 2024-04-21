<?php

namespace Database\Factories;

use App\Models\FarmType;
use Illuminate\Database\Eloquent\Factories\Factory;


class FarmTypeFactory extends Factory
{
    protected $model = FarmType::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->unique()->word
        ];
    }
}
