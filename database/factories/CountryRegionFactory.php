<?php

namespace Database\Factories;

use App\Models\CountryRegion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryRegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CountryRegion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'initials' => $this->faker->unique()->lexify('??'),
            'name' => $this->faker->unique()->lexify('??????')
        ];
    }
}
