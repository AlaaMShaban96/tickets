<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Day;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DayController
 */
class DayControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $days = Day::factory()->count(3)->create();

        $response = $this->get(route('day.index'));

        $response->assertOk();
        $response->assertViewIs('day.index');
        $response->assertViewHas('days');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('day.create'));

        $response->assertOk();
        $response->assertViewIs('day.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DayController::class,
            'store',
            \App\Http\Requests\DayStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $code = $this->faker->word;

        $response = $this->post(route('day.store'), [
            'name' => $name,
            'code' => $code,
        ]);

        $days = Day::query()
            ->where('name', $name)
            ->where('code', $code)
            ->get();
        $this->assertCount(1, $days);
        $day = $days->first();

        $response->assertRedirect(route('day.index'));
        $response->assertSessionHas('day.id', $day->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $day = Day::factory()->create();

        $response = $this->get(route('day.show', $day));

        $response->assertOk();
        $response->assertViewIs('day.show');
        $response->assertViewHas('day');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $day = Day::factory()->create();

        $response = $this->get(route('day.edit', $day));

        $response->assertOk();
        $response->assertViewIs('day.edit');
        $response->assertViewHas('day');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DayController::class,
            'update',
            \App\Http\Requests\DayUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $day = Day::factory()->create();
        $name = $this->faker->name;
        $code = $this->faker->word;

        $response = $this->put(route('day.update', $day), [
            'name' => $name,
            'code' => $code,
        ]);

        $day->refresh();

        $response->assertRedirect(route('day.index'));
        $response->assertSessionHas('day.id', $day->id);

        $this->assertEquals($name, $day->name);
        $this->assertEquals($code, $day->code);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $day = Day::factory()->create();

        $response = $this->delete(route('day.destroy', $day));

        $response->assertRedirect(route('day.index'));

        $this->assertModelMissing($day);
    }
}
