<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Passenger;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PassengerController
 */
class PassengerControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $passengers = Passenger::factory()->count(3)->create();

        $response = $this->get(route('passenger.index'));

        $response->assertOk();
        $response->assertViewIs('passenger.index');
        $response->assertViewHas('passengers');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('passenger.create'));

        $response->assertOk();
        $response->assertViewIs('passenger.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PassengerController::class,
            'store',
            \App\Http\Requests\PassengerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $ticket = Ticket::factory()->create();
        $name = $this->faker->name;
        $last_name = $this->faker->lastName;
        $gender = $this->faker->randomElement(/** enum_attributes **/);
        $nationality = $this->faker->word;
        $place_of_birth = $this->faker->word;
        $birth_date = $this->faker->date();
        $mobile_number = $this->faker->word;
        $emile = $this->faker->word;
        $passport_number = $this->faker->word;
        $passport_expiry_date = $this->faker->date();

        $response = $this->post(route('passenger.store'), [
            'ticket_id' => $ticket->id,
            'name' => $name,
            'last_name' => $last_name,
            'gender' => $gender,
            'nationality' => $nationality,
            'place_of_birth' => $place_of_birth,
            'birth_date' => $birth_date,
            'mobile_number' => $mobile_number,
            'emile' => $emile,
            'passport_number' => $passport_number,
            'passport_expiry_date' => $passport_expiry_date,
        ]);

        $passengers = Passenger::query()
            ->where('ticket_id', $ticket->id)
            ->where('name', $name)
            ->where('last_name', $last_name)
            ->where('gender', $gender)
            ->where('nationality', $nationality)
            ->where('place_of_birth', $place_of_birth)
            ->where('birth_date', $birth_date)
            ->where('mobile_number', $mobile_number)
            ->where('emile', $emile)
            ->where('passport_number', $passport_number)
            ->where('passport_expiry_date', $passport_expiry_date)
            ->get();
        $this->assertCount(1, $passengers);
        $passenger = $passengers->first();

        $response->assertRedirect(route('passenger.index'));
        $response->assertSessionHas('passenger.id', $passenger->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $passenger = Passenger::factory()->create();

        $response = $this->get(route('passenger.show', $passenger));

        $response->assertOk();
        $response->assertViewIs('passenger.show');
        $response->assertViewHas('passenger');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $passenger = Passenger::factory()->create();

        $response = $this->get(route('passenger.edit', $passenger));

        $response->assertOk();
        $response->assertViewIs('passenger.edit');
        $response->assertViewHas('passenger');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PassengerController::class,
            'update',
            \App\Http\Requests\PassengerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $passenger = Passenger::factory()->create();
        $ticket = Ticket::factory()->create();
        $name = $this->faker->name;
        $last_name = $this->faker->lastName;
        $gender = $this->faker->randomElement(/** enum_attributes **/);
        $nationality = $this->faker->word;
        $place_of_birth = $this->faker->word;
        $birth_date = $this->faker->date();
        $mobile_number = $this->faker->word;
        $emile = $this->faker->word;
        $passport_number = $this->faker->word;
        $passport_expiry_date = $this->faker->date();

        $response = $this->put(route('passenger.update', $passenger), [
            'ticket_id' => $ticket->id,
            'name' => $name,
            'last_name' => $last_name,
            'gender' => $gender,
            'nationality' => $nationality,
            'place_of_birth' => $place_of_birth,
            'birth_date' => $birth_date,
            'mobile_number' => $mobile_number,
            'emile' => $emile,
            'passport_number' => $passport_number,
            'passport_expiry_date' => $passport_expiry_date,
        ]);

        $passenger->refresh();

        $response->assertRedirect(route('passenger.index'));
        $response->assertSessionHas('passenger.id', $passenger->id);

        $this->assertEquals($ticket->id, $passenger->ticket_id);
        $this->assertEquals($name, $passenger->name);
        $this->assertEquals($last_name, $passenger->last_name);
        $this->assertEquals($gender, $passenger->gender);
        $this->assertEquals($nationality, $passenger->nationality);
        $this->assertEquals($place_of_birth, $passenger->place_of_birth);
        $this->assertEquals(Carbon::parse($birth_date), $passenger->birth_date);
        $this->assertEquals($mobile_number, $passenger->mobile_number);
        $this->assertEquals($emile, $passenger->emile);
        $this->assertEquals($passport_number, $passenger->passport_number);
        $this->assertEquals(Carbon::parse($passport_expiry_date), $passenger->passport_expiry_date);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $passenger = Passenger::factory()->create();

        $response = $this->delete(route('passenger.destroy', $passenger));

        $response->assertRedirect(route('passenger.index'));

        $this->assertModelMissing($passenger);
    }
}
