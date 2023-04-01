<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;

class TicketController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = Ticket::all();

        return view('ticket.index', compact('tickets'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ticket.create');
    }

    /**
     * @param \App\Http\Requests\TicketStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStoreRequest $request)
    {
        // create ticket
        $ticket = Ticket::create([
            'trip_id'=>$request->trip_id,
            'type'=> $request->type,
            'seat_type_id'=> $request->seat_type_id,
            'journey_date'=> Carbon::parse($request->journey_date),
            'adults_number'=> $request->numberOfAdult,
            'children_number'=> $request->numberOfChildren
        ]);
        foreach ($request->passengers as $key => $passenger) {
            $passenger['ticket_id']=$ticket->id;
            if (isset($passenger['passport_photo'])) {
                $passenger['passport_photo'] = Storage::disk('local')->put("public/ticket/".$ticket->id."/passport/".$passenger['name'].".jpg", $passenger['passport_photo']);
            }
            if (isset($passenger['visa_photo'])) {
                $passenger['visa_photo'] = Storage::disk('local')->put("public/ticket/".$ticket->id."/visa/".$passenger['name'].".jpg", $passenger['visa_photo']);
            }

            Passenger::create($passenger);
        }
        DB::table('users')
        ->where('trip_id', $request->trip_id)  // find your user by their email
        ->where('trip_id', $request->trip_id)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('member_type' => $plan));  // update the record in the DB.
        $request->session()->flash('ticket.id', $ticket->id);

        return view('ticket.confirmed',compact('ticket'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * @param \App\Http\Requests\TicketUpdateRequest $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());

        $request->session()->flash('ticket.id', $ticket->id);

        return redirect()->route('ticket.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('ticket.index');
    }
}
