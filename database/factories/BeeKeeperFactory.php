<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\BeeKeeper;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BeeKeeper>
 */
class BeeKeeperFactory extends Factory
{
    protected $model = BeeKeeper::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;
        $barangayId = \App\Models\Barangay::inRandomOrder()->first()->id;

        return [
            'municipality_id' => $municipalityId,
            'barangay_id' => $barangayId,
            'colonies' => $this->faker->numberBetween(1, 100),
            'bee_keepers' => $this->faker->numberBetween(1, 100),
            'year' => $this->faker->year,
        ];
    }
}
