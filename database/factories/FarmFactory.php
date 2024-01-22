<?php

namespace Database\Factories;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farm>
 */
class FarmFactory extends Factory
{
    protected $model = Farm::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;

        return [
            'municipality_id' => $municipalityId,
            'level' => $this->faker->randomElement(['provincial', 'municipal']),
            'farm_name' => $this->faker->unique()->company,
            'farm_area' => $this->faker->randomFloat(2, 1, 100),
            'farm_sector' => $this->faker->randomElement(['government', 'commercial']),
            'farm_type' => $this->faker->randomElement(['animal_and_fishery_breeding', 'cattle', 'poultry', 'piggery']),
            'year_established' => $this->faker->year,
            'year_closed' => $this->faker->optional(0.2)->year, // 20% chance of being nullable
        ];
    }
}
