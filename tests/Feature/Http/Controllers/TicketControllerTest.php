<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TicketController
 */
class TicketControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tickets = Ticket::factory()->count(3)->create();

        $response = $this->get(route('ticket.index'));

        $response->assertOk();
        $response->assertViewIs('ticket.index');
        $response->assertViewHas('tickets');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('ticket.create'));

        $response->assertOk();
        $response->assertViewIs('ticket.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TicketController::class,
            'store',
            \App\Http\Requests\TicketStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $trip = Trip::factory()->create();
        $type = $this->faker->randomElement(/** enum_attributes **/);
        $adults_number = $this->faker->word;
        $children_number = $this->faker->word;
        $passport_photo = $this->faker->word;

        $response = $this->post(route('ticket.store'), [
            'trip_id' => $trip->id,
            'type' => $type,
            'adults_number' => $adults_number,
            'children_number' => $children_number,
            'passport_photo' => $passport_photo,
        ]);

        $tickets = Ticket::query()
            ->where('trip_id', $trip->id)
            ->where('type', $type)
            ->where('adults_number', $adults_number)
            ->where('children_number', $children_number)
            ->where('passport_photo', $passport_photo)
            ->get();
        $this->assertCount(1, $tickets);
        $ticket = $tickets->first();

        $response->assertRedirect(route('ticket.index'));
        $response->assertSessionHas('ticket.id', $ticket->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $ticket = Ticket::factory()->create();

        $response = $this->get(route('ticket.show', $ticket));

        $response->assertOk();
        $response->assertViewIs('ticket.show');
        $response->assertViewHas('ticket');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $ticket = Ticket::factory()->create();

        $response = $this->get(route('ticket.edit', $ticket));

        $response->assertOk();
        $response->assertViewIs('ticket.edit');
        $response->assertViewHas('ticket');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TicketController::class,
            'update',
            \App\Http\Requests\TicketUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $ticket = Ticket::factory()->create();
        $trip = Trip::factory()->create();
        $type = $this->faker->randomElement(/** enum_attributes **/);
        $adults_number = $this->faker->word;
        $children_number = $this->faker->word;
        $passport_photo = $this->faker->word;

        $response = $this->put(route('ticket.update', $ticket), [
            'trip_id' => $trip->id,
            'type' => $type,
            'adults_number' => $adults_number,
            'children_number' => $children_number,
            'passport_photo' => $passport_photo,
        ]);

        $ticket->refresh();

        $response->assertRedirect(route('ticket.index'));
        $response->assertSessionHas('ticket.id', $ticket->id);

        $this->assertEquals($trip->id, $ticket->trip_id);
        $this->assertEquals($type, $ticket->type);
        $this->assertEquals($adults_number, $ticket->adults_number);
        $this->assertEquals($children_number, $ticket->children_number);
        $this->assertEquals($passport_photo, $ticket->passport_photo);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $ticket = Ticket::factory()->create();

        $response = $this->delete(route('ticket.destroy', $ticket));

        $response->assertRedirect(route('ticket.index'));

        $this->assertModelMissing($ticket);
    }
}
