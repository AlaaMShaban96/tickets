<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ticket;
use App\Models\Trip;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'trip_id' => Trip::factory(),
            'type' => $this->faker->randomElement(["one_way","return"]),
            'adults_number' => $this->faker->word,
            'children_number' => $this->faker->word,
            'passport_photo' => $this->faker->word,
            'visa_photo' => $this->faker->word,
            'deleted_at' => $this->faker->dateTime(),
        ];
    }
}
