<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Airport;
use App\Models\Plane;
use App\Models\Trip;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'plane_id' => Plane::factory(),
            'from_airport_id' => Airport::factory(),
            'to_airport_id' => Airport::factory(),
            'take_off_at' => $this->faker->time(),
            'landing_at' => $this->faker->time(),
            'adults_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'children_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'need_visa' => $this->faker->boolean,
            'deleted_at' => $this->faker->dateTime(),
        ];
    }
}
