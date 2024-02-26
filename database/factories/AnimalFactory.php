<?php

namespace Database\Factories;

use App\Models\Animal;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(): array
    {
        $animalName = $this->faker->unique()->text(20);

        return [
            'animal_name' => $animalName,
            'classification' => $this->faker->randomElement(['Livestock', 'Poultry', 'Fish', 'Pet', 'Insect']),
            // 'type' => $this->faker->text(11),
            // 'timestamps' will be automatically managed by Eloquent
        ];
    }
}
