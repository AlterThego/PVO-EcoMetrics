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
        return [
            'municipality_id' => function () {
                return \App\Models\Municipality::factory()->create()->id;
            },
            'census_year' => $this->faker->year,
            'population_count' => $this->faker->numberBetween(100, 10000),
        ];
    }
}
