<?php

namespace Database\Factories;

use App\Models\Animal;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(): array
    {
        return [
            'animal_id' => $this->faker->numberBetween(1, 1000),
            'animal_name' => $this->faker->randomElement(['livestock', 'poultry', 'fish', 'pet', 'insect']),
            'type' => $this->faker->text(11),
            // 'timestamps' will be automatically managed by Eloquent
        ];
    }
}
