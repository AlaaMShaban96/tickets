<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportStoreRequest;
use App\Http\Requests\AirportUpdateRequest;
use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $airports = Airport::all();

        return view('airport.index', compact('airports'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('airport.create');
    }

    /**
     * @param \App\Http\Requests\AirportStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportStoreRequest $request)
    {
        $airport = Airport::create($request->validated());

        $request->session()->flash('airport.id', $airport->id);

        return redirect()->route('airport.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Airport $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Airport $airport)
    {
        return view('airport.show', compact('airport'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Airport $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Airport $airport)
    {
        return view('airport.edit', compact('airport'));
    }

    /**
     * @param \App\Http\Requests\AirportUpdateRequest $request
     * @param \App\Models\Airport $airport
     * @return \Illuminate\Http\Response
     */
    public function update(AirportUpdateRequest $request, Airport $airport)
    {
        $airport->update($request->validated());

        $request->session()->flash('airport.id', $airport->id);

        return redirect()->route('airport.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Airport $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Airport $airport)
    {
        $airport->delete();

        return redirect()->route('airport.index');
    }
}
