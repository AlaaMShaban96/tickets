<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirlineStoreRequest;
use App\Http\Requests\AirlineUpdateRequest;
use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $airlines = Airline::all();

        return view('airline.index', compact('airlines'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('airline.create');
    }

    /**
     * @param \App\Http\Requests\AirlineStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirlineStoreRequest $request)
    {
        $airline = Airline::create($request->validated());

        $request->session()->flash('airline.id', $airline->id);

        return redirect()->route('airline.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Airline $airline)
    {
        return view('airline.show', compact('airline'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Airline $airline)
    {
        return view('airline.edit', compact('airline'));
    }

    /**
     * @param \App\Http\Requests\AirlineUpdateRequest $request
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Http\Response
     */
    public function update(AirlineUpdateRequest $request, Airline $airline)
    {
        $airline->update($request->validated());

        $request->session()->flash('airline.id', $airline->id);

        return redirect()->route('airline.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Airline $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Airline $airline)
    {
        $airline->delete();

         return redirect()->route('airline.index');
    }
}
