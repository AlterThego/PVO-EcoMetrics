<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Barangay;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barangay>
 */
class BarangayFactory extends Factory
{
    protected $model = Barangay::class;

    public function definition(): array
    {
        // Assuming there are existing Municipality records
        $municipalityId = \App\Models\Municipality::inRandomOrder()->first()->id;

        return [
            'municipality_id' => $municipalityId,
            'barangay_name' => $this->faker->unique()->city,
        ];
    }
}
