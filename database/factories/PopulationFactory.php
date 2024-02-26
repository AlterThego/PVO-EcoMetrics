<?php

namespace Database\Factories;

use App\Models\Population;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Population>
 */
class PopulationFactory extends Factory
{
    protected $model = Population::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;
        $year = $this->faker->unique()->year;

        return [
            'municipality_id' => $municipalityId,
            'census_year' => $year,
            'population_count' => $this->faker->numberBetween(100, 10000),
        ];
    }
}
