<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\SeatType;
use Illuminate\Http\Request;
use App\Http\Requests\TripStoreRequest;
use App\Http\Requests\TripUpdateRequest;

class TripController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trips = Trip::all();

        return view('trip.index', compact('trips'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('trip.create');
    }

    /**
     * @param \App\Http\Requests\TripStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripStoreRequest $request)
    {
        $trip = Trip::create($request->validated());

        $request->session()->flash('trip.id', $trip->id);

        return redirect()->route('trip.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Trip $trip)
    {
        return view('trip.show', compact('trip'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Trip $trip)
    {
        return view('trip.edit', compact('trip'));
    }

    /**
     * @param \App\Http\Requests\TripUpdateRequest $request
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function update(TripUpdateRequest $request, Trip $trip)
    {
        $trip->update($request->validated());

        $request->session()->flash('trip.id', $trip->id);

        return redirect()->route('trip.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Trip $trip)
    {
        $trip->delete();

        return redirect()->route('trip.index');
    }
    public function booking( Trip $trip ,Request $request)
    {


        $seatType=SeatType::find($request->seat_types_id);
        $journey_date=$request->journey_date;
        $numberOfChildren=$request->numberOfChildren;
        $numberOfAdult=$request->numberOfAdult;
        $numberOfPassengers=$numberOfAdult + $numberOfChildren;
        // dd($numberOfPassengers,$numberOfAdult , $numberOfChildren);
        return view("trip.booking",compact('trip','numberOfPassengers','numberOfChildren','numberOfAdult','seatType','journey_date'));
    }
}
