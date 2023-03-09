<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripStoreRequest;
use App\Http\Requests\TripUpdateRequest;
use App\Models\Trip;
use Illuminate\Http\Request;

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
}
