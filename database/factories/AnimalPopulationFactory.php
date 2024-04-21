<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\AnimalPopulation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalPopulation>
 */
class AnimalPopulationFactory extends Factory
{
    protected $model = AnimalPopulation::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality, Animal, and AnimalType records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;
        $barangayId = \App\Models\Barangay::inRandomOrder()->first()->id;
        $animalId = \App\Models\Animal::inRandomOrder()->first()->id;
        $animalTypeId = \App\Models\AnimalType::inRandomOrder()->first()->id;
        $year = $this->faker->numberBetween(2017, 2024);
        return [
            'municipality_id' => $municipalityId,
            'barangay_id' => $barangayId,
            'animal_id' => $animalId,
            'animal_type_id' => $animalTypeId,
            'year' => $year,
            'animal_population_count' => $this->faker->numberBetween(100, 10000),
            'volume' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
