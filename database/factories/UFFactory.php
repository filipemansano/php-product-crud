<?php

namespace Database\Factories;

use App\Models\UF;
use App\Models\CountryRegion;
use Illuminate\Database\Eloquent\Factories\Factory;

class UFFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UF::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_region_id' => CountryRegion::factory(),
            'initials' => $this->faker->unique()->lexify('??'),
            'name' => $this->faker->unique()->state()
        ];
    }
}
