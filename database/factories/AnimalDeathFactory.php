<?php

namespace Database\Factories;

use App\Models\AnimalDeath;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalDeath>
 */
class AnimalDeathFactory extends Factory
{
    protected $model = AnimalDeath::class;

    public function definition(): array
    {
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;
        $barangayId = \App\Models\Barangay::inRandomOrder()->first()->id;
        $animalId = \App\Models\Animal::inRandomOrder()->first()->id;

        return [
            'municipality_id' => $municipalityId,
            'barangay_id' => $barangayId,
            'animal_id' => $animalId,
            'year' => $this->faker->year,
            'count' => $this->faker->numberBetween(1, 100),
        ];
    }
}
