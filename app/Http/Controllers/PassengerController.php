<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Http\Requests\PassengerStoreRequest;
use App\Http\Requests\PassengerUpdateRequest;

class PassengerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $passengers = Passenger::all();

        return view('passenger.index', compact('passengers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('passenger.create');
    }

    /**
     * @param \App\Http\Requests\PassengerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PassengerStoreRequest $request)
    {
        $passenger = Passenger::create($request->validated());

        $request->session()->flash('passenger.id', $passenger->id);

        return redirect()->route('passenger.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Passenger $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Passenger $passenger)
    {
        return view('passenger.show', compact('passenger'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Passenger $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Passenger $passenger)
    {
        return view('passenger.edit', compact('passenger'));
    }

    /**
     * @param \App\Http\Requests\PassengerUpdateRequest $request
     * @param \App\Models\Passenger $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(PassengerUpdateRequest $request, Passenger $passenger)
    {
        $passenger->update($request->validated());

        $request->session()->flash('passenger.id', $passenger->id);

        return redirect()->route('passenger.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Passenger $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Passenger $passenger)
    {
        $passenger->delete();

        return redirect()->route('passenger.index');
    }
    public function list(Ticket $ticket)
    {
        return view('passenger.list',compact('ticket'));
    }
}
