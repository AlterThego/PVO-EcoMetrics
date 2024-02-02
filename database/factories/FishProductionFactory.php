<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FishProduction;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FishProduction>
 */
class FishProductionFactory extends Factory
{
    protected $model = FishProduction::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['Fish Pond', 'Fish Cage', 'Fish in Tank', 'Rice-Fish Culture', 'Communal Bodies of Water']),
            // Add other attributes and their respective values as needed
        ];
    }
}
