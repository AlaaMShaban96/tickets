<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\SeatType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SeatTypeController
 */
class SeatTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $seatTypes = SeatType::factory()->count(3)->create();

        $response = $this->get(route('seat-type.index'));

        $response->assertOk();
        $response->assertViewIs('seatType.index');
        $response->assertViewHas('seatTypes');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('seat-type.create'));

        $response->assertOk();
        $response->assertViewIs('seatType.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SeatTypeController::class,
            'store',
            \App\Http\Requests\SeatTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('seat-type.store'), [
            'name' => $name,
        ]);

        $seatTypes = SeatType::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $seatTypes);
        $seatType = $seatTypes->first();

        $response->assertRedirect(route('seatType.index'));
        $response->assertSessionHas('seatType.id', $seatType->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $seatType = SeatType::factory()->create();

        $response = $this->get(route('seat-type.show', $seatType));

        $response->assertOk();
        $response->assertViewIs('seatType.show');
        $response->assertViewHas('seatType');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $seatType = SeatType::factory()->create();

        $response = $this->get(route('seat-type.edit', $seatType));

        $response->assertOk();
        $response->assertViewIs('seatType.edit');
        $response->assertViewHas('seatType');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SeatTypeController::class,
            'update',
            \App\Http\Requests\SeatTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $seatType = SeatType::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('seat-type.update', $seatType), [
            'name' => $name,
        ]);

        $seatType->refresh();

        $response->assertRedirect(route('seatType.index'));
        $response->assertSessionHas('seatType.id', $seatType->id);

        $this->assertEquals($name, $seatType->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $seatType = SeatType::factory()->create();

        $response = $this->delete(route('seat-type.destroy', $seatType));

        $response->assertRedirect(route('seatType.index'));

        $this->assertModelMissing($seatType);
    }
}
