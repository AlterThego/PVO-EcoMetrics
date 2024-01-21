<?php


namespace Database\Factories;

use App\Models\Municipality;

use Illuminate\Database\Eloquent\Factories\Factory;


class MunicipalityFactory extends Factory
{
    protected $model = Municipality::class;

    public function definition(): array
    {
        return [
            'municipality_name' => $this->faker->city,
            'zip_code' => $this->faker->postcode,
            'land_area' => $this->faker->randomFloat(2, 1, 100), 
        ];
    }
}
