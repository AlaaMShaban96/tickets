<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\FromAirport;
use App\Models\Plane;
use App\Models\ToAirport;
use App\Models\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TripController
 */
class TripControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $trips = Trip::factory()->count(3)->create();

        $response = $this->get(route('trip.index'));

        $response->assertOk();
        $response->assertViewIs('trip.index');
        $response->assertViewHas('trips');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('trip.create'));

        $response->assertOk();
        $response->assertViewIs('trip.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TripController::class,
            'store',
            \App\Http\Requests\TripStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $plane = Plane::factory()->create();
        $from_airport = FromAirport::factory()->create();
        $to_airport = ToAirport::factory()->create();
        $take_off_at = $this->faker->time();
        $landing_at = $this->faker->time();
        $adults_price = $this->faker->randomFloat(/** double_attributes **/);
        $need_visa = $this->faker->boolean;

        $response = $this->post(route('trip.store'), [
            'name' => $name,
            'plane_id' => $plane->id,
            'from_airport_id' => $from_airport->id,
            'to_airport_id' => $to_airport->id,
            'take_off_at' => $take_off_at,
            'landing_at' => $landing_at,
            'adults_price' => $adults_price,
            'need_visa' => $need_visa,
        ]);

        $trips = Trip::query()
            ->where('name', $name)
            ->where('plane_id', $plane->id)
            ->where('from_airport_id', $from_airport->id)
            ->where('to_airport_id', $to_airport->id)
            ->where('take_off_at', $take_off_at)
            ->where('landing_at', $landing_at)
            ->where('adults_price', $adults_price)
            ->where('need_visa', $need_visa)
            ->get();
        $this->assertCount(1, $trips);
        $trip = $trips->first();

        $response->assertRedirect(route('trip.index'));
        $response->assertSessionHas('trip.id', $trip->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $trip = Trip::factory()->create();

        $response = $this->get(route('trip.show', $trip));

        $response->assertOk();
        $response->assertViewIs('trip.show');
        $response->assertViewHas('trip');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $trip = Trip::factory()->create();

        $response = $this->get(route('trip.edit', $trip));

        $response->assertOk();
        $response->assertViewIs('trip.edit');
        $response->assertViewHas('trip');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TripController::class,
            'update',
            \App\Http\Requests\TripUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $trip = Trip::factory()->create();
        $name = $this->faker->name;
        $plane = Plane::factory()->create();
        $from_airport = FromAirport::factory()->create();
        $to_airport = ToAirport::factory()->create();
        $take_off_at = $this->faker->time();
        $landing_at = $this->faker->time();
        $adults_price = $this->faker->randomFloat(/** double_attributes **/);
        $need_visa = $this->faker->boolean;

        $response = $this->put(route('trip.update', $trip), [
            'name' => $name,
            'plane_id' => $plane->id,
            'from_airport_id' => $from_airport->id,
            'to_airport_id' => $to_airport->id,
            'take_off_at' => $take_off_at,
            'landing_at' => $landing_at,
            'adults_price' => $adults_price,
            'need_visa' => $need_visa,
        ]);

        $trip->refresh();

        $response->assertRedirect(route('trip.index'));
        $response->assertSessionHas('trip.id', $trip->id);

        $this->assertEquals($name, $trip->name);
        $this->assertEquals($plane->id, $trip->plane_id);
        $this->assertEquals($from_airport->id, $trip->from_airport_id);
        $this->assertEquals($to_airport->id, $trip->to_airport_id);
        $this->assertEquals($take_off_at, $trip->take_off_at);
        $this->assertEquals($landing_at, $trip->landing_at);
        $this->assertEquals($adults_price, $trip->adults_price);
        $this->assertEquals($need_visa, $trip->need_visa);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $trip = Trip::factory()->create();

        $response = $this->delete(route('trip.destroy', $trip));

        $response->assertRedirect(route('trip.index'));

        $this->assertModelMissing($trip);
    }
}
