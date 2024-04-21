<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\AffectedAnimals;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AffectedAnimals>
 */
class AffectedAnimalsFactory extends Factory
{
    protected $model = AffectedAnimals::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality and Animal records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;
        $barangayId = \App\Models\Barangay::inRandomOrder()->first()->id;
        $animalId = \App\Models\Animal::inRandomOrder()->first()->id;
        $year = $this->faker->unique()->year;

        return [
            'municipality_id' => $municipalityId,
            'barangay_id' => $barangayId,
            'animal_id' => $animalId,
            'year' => $year,
            'count' => $this->faker->numberBetween(1, 100),
        ];
    }
}
