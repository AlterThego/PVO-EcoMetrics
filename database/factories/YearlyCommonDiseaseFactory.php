<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


use App\Models\YearlyCommonDisease;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\YearlyCommonDisease>
 */
class YearlyCommonDiseaseFactory extends Factory
{
    protected $model = YearlyCommonDisease::class;

    public function definition(): array
    {
        $diseaseId = \App\Models\Disease::inRandomOrder()->first()->id;

        return [
            'disease_id' => $diseaseId,
            'year' => $this->faker->year,
            'disease_count' => $this->faker->numberBetween(100, 10000),
        ];
    }
}
