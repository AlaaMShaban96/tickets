<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Airport;
use App\Models\County;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AirportController
 */
class AirportControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $airports = Airport::factory()->count(3)->create();

        $response = $this->get(route('airport.index'));

        $response->assertOk();
        $response->assertViewIs('airport.index');
        $response->assertViewHas('airports');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('airport.create'));

        $response->assertOk();
        $response->assertViewIs('airport.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AirportController::class,
            'store',
            \App\Http\Requests\AirportStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $county = County::factory()->create();

        $response = $this->post(route('airport.store'), [
            'name' => $name,
            'country_id' => $county->id,
        ]);

        $airports = Airport::query()
            ->where('name', $name)
            ->where('country_id', $county->id)
            ->get();
        $this->assertCount(1, $airports);
        $airport = $airports->first();

        $response->assertRedirect(route('airport.index'));
        $response->assertSessionHas('airport.id', $airport->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $airport = Airport::factory()->create();

        $response = $this->get(route('airport.show', $airport));

        $response->assertOk();
        $response->assertViewIs('airport.show');
        $response->assertViewHas('airport');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $airport = Airport::factory()->create();

        $response = $this->get(route('airport.edit', $airport));

        $response->assertOk();
        $response->assertViewIs('airport.edit');
        $response->assertViewHas('airport');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AirportController::class,
            'update',
            \App\Http\Requests\AirportUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $airport = Airport::factory()->create();
        $name = $this->faker->name;
        $county = County::factory()->create();

        $response = $this->put(route('airport.update', $airport), [
            'name' => $name,
            'country_id' => $county->id,
        ]);

        $airport->refresh();

        $response->assertRedirect(route('airport.index'));
        $response->assertSessionHas('airport.id', $airport->id);

        $this->assertEquals($name, $airport->name);
        $this->assertEquals($county->id, $airport->country_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $airport = Airport::factory()->create();

        $response = $this->delete(route('airport.destroy', $airport));

        $response->assertRedirect(route('airport.index'));

        $this->assertModelMissing($airport);
    }
}
