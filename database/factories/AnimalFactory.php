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
            'animal_name' =>$this->faker->text(20),
            'classification' => $this->faker->randomElement(['livestock', 'poultry', 'fish', 'pet', 'insect']),
            'type' => $this->faker->text(11),
            // 'timestamps' will be automatically managed by Eloquent
        ];
    }
}
