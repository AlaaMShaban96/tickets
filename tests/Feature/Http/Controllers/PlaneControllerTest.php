<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Airline;
use App\Models\Plane;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PlaneController
 */
class PlaneControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $planes = Plane::factory()->count(3)->create();

        $response = $this->get(route('plane.index'));

        $response->assertOk();
        $response->assertViewIs('plane.index');
        $response->assertViewHas('planes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('plane.create'));

        $response->assertOk();
        $response->assertViewIs('plane.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PlaneController::class,
            'store',
            \App\Http\Requests\PlaneStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $airline = Airline::factory()->create();

        $response = $this->post(route('plane.store'), [
            'name' => $name,
            'airline_id' => $airline->id,
        ]);

        $planes = Plane::query()
            ->where('name', $name)
            ->where('airline_id', $airline->id)
            ->get();
        $this->assertCount(1, $planes);
        $plane = $planes->first();

        $response->assertRedirect(route('plane.index'));
        $response->assertSessionHas('plane.id', $plane->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $plane = Plane::factory()->create();

        $response = $this->get(route('plane.show', $plane));

        $response->assertOk();
        $response->assertViewIs('plane.show');
        $response->assertViewHas('plane');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $plane = Plane::factory()->create();

        $response = $this->get(route('plane.edit', $plane));

        $response->assertOk();
        $response->assertViewIs('plane.edit');
        $response->assertViewHas('plane');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PlaneController::class,
            'update',
            \App\Http\Requests\PlaneUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $plane = Plane::factory()->create();
        $name = $this->faker->name;
        $airline = Airline::factory()->create();

        $response = $this->put(route('plane.update', $plane), [
            'name' => $name,
            'airline_id' => $airline->id,
        ]);

        $plane->refresh();

        $response->assertRedirect(route('plane.index'));
        $response->assertSessionHas('plane.id', $plane->id);

        $this->assertEquals($name, $plane->name);
        $this->assertEquals($airline->id, $plane->airline_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $plane = Plane::factory()->create();

        $response = $this->delete(route('plane.destroy', $plane));

        $response->assertRedirect(route('plane.index'));

        $this->assertModelMissing($plane);
    }
}
