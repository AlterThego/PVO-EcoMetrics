<?php

namespace Database\Factories;

use App\Models\AnimalType;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalType>
 */
class AnimalTypeFactory extends Factory
{
    protected $model = AnimalType::class;

    public function definition(): array
    {
        // Assuming there are existing Animal records, get a random animal_id
        $animalId = \App\Models\Animal::inRandomOrder()->first()->id;

        return [
            'animal_id' => $animalId,
            'type' => $this->faker->randomElement(['Layers', 'Broiler', 'Native', 'Fighting', null]),
        ];
    }
}
