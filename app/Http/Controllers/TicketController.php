<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Booking;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
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
        try {
            DB::beginTransaction();
                    // create ticket
                    $ticket = Ticket::create([
                        'trip_id'=>$request->trip_id,
                        'type'=> $request->type,
                        'seat_type_id'=> $request->seat_type_id,
                        'journey_date'=> Carbon::parse($request->journey_date),
                        'adults_number'=> $request->numberOfAdult,
                        'children_number'=> $request->numberOfChildren
                    ]);
                    if ($request->return_date != null && $request->return_trip_id != null ) {
                        $returnTicket = Ticket::create([
                            'trip_id'=>$request->return_trip_id,
                            'type'=> $request->type,
                            'seat_type_id'=> $request->seat_type_id,
                            'journey_date'=> Carbon::parse($request->return_date),
                            'adults_number'=> $request->numberOfAdult,
                            'children_number'=> $request->numberOfChildren
                        ]);
                    }

                    foreach ($request->passengers as $key => $data) {
                        $data['ticket_id']=$ticket->id;
                        if (isset($data['passport_photo'])) {
                            $data['passport_photo'] = Storage::disk('local')->put("public/ticket/".$ticket->id."/passport/".$data['name'], $data['passport_photo']);
                        }
                        if (isset($data['visa_photo'])) {
                            $data['visa_photo'] = Storage::disk('local')->put("public/ticket/".$ticket->id."/visa/".$data['name'], $data['visa_photo']);
                        }
                        $passenger=Passenger::create($data);
                        if (isset($returnTicket)) {
                            $return_passenger=$passenger->replicate();
                            $return_passenger->ticket_id=$returnTicket->id;
                            $return_passenger->push();
                        }
                    }


                    $request->session()->flash('ticket.id', $ticket->id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::toast('system error', 'error')->position('top-end')->autoClose(5000);
            return redirect()->back()->withInput();
        }


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
    public function chengeStatus(Request $request, Ticket $ticket)
    {
        $ticket->status=$request->status;
        $ticket->save();
        Alert::toast('chenge status successfull ', 'success')->position('top-end')->autoClose(5000);
        return redirect()->back();
    }
}
