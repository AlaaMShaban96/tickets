<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Passenger;
use App\Models\Ticket;

class PassengerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passenger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => Ticket::factory(),
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(["male","female"]),
            'nationality' => $this->faker->word,
            'place_of_birth' => $this->faker->word,
            'birth_date' => $this->faker->date(),
            'mobile_number' => $this->faker->word,
            'emile' => $this->faker->word,
            'passport_number' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'passport_expiry_date' => $this->faker->date(),
            'deleted_at' => $this->faker->dateTime(),
        ];
    }
}
