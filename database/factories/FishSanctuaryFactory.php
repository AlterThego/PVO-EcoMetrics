<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FishSanctuary;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FishSanctuary>
 */
class FishSanctuaryFactory extends Factory
{
    protected $model = FishSanctuary::class;

    public function definition(): array
    {
        // Assuming there are existing Barangay records
        $barangayId = \App\Models\Barangay::inRandomOrder()->first()->id;
        $year = $this->faker->unique()->year;

        return [
            'barangay_id' => $barangayId,
            'year' => $year,
            'land_area' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
