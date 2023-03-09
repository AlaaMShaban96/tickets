<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Airline;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AirlineController
 */
class AirlineControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $airlines = Airline::factory()->count(3)->create();

        $response = $this->get(route('airline.index'));

        $response->assertOk();
        $response->assertViewIs('airline.index');
        $response->assertViewHas('airlines');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('airline.create'));

        $response->assertOk();
        $response->assertViewIs('airline.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AirlineController::class,
            'store',
            \App\Http\Requests\AirlineStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('airline.store'), [
            'name' => $name,
        ]);

        $airlines = Airline::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $airlines);
        $airline = $airlines->first();

        $response->assertRedirect(route('airline.index'));
        $response->assertSessionHas('airline.id', $airline->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $airline = Airline::factory()->create();

        $response = $this->get(route('airline.show', $airline));

        $response->assertOk();
        $response->assertViewIs('airline.show');
        $response->assertViewHas('airline');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $airline = Airline::factory()->create();

        $response = $this->get(route('airline.edit', $airline));

        $response->assertOk();
        $response->assertViewIs('airline.edit');
        $response->assertViewHas('airline');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AirlineController::class,
            'update',
            \App\Http\Requests\AirlineUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $airline = Airline::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('airline.update', $airline), [
            'name' => $name,
        ]);

        $airline->refresh();

        $response->assertRedirect(route('airline.index'));
        $response->assertSessionHas('airline.id', $airline->id);

        $this->assertEquals($name, $airline->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $airline = Airline::factory()->create();

        $response = $this->delete(route('airline.destroy', $airline));

        $response->assertRedirect(route('airline.index'));

        $this->assertModelMissing($airline);
    }
}
