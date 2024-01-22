<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use app\Models\FarmSupply;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FarmSupplies>
 */
class FarmSupplyFactory extends Factory
{
    protected $model = FarmSupply::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;

        return [
            'municipality_id' => $municipalityId,
            'colonies' => $this->faker->numberBetween(1, 100),
            'bee_keepers' => $this->faker->numberBetween(1, 100),
            'year' => $this->faker->year,
        ];
    }
}
