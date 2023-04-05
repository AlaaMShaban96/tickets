<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Country;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AirportStoreRequest;
use App\Http\Requests\AirportUpdateRequest;

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
        $countries=Country::all();
        return view('airport.create',compact('countries'));
    }

    /**
     * @param \App\Http\Requests\AirportStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AirportStoreRequest $request)
    {
        // dd($request->all());
        $airport = Airport::create($request->validated());

        $request->session()->flash('airport.id', $airport->id);

        return redirect()->route('airports.index');
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
        $countries=Country::all();

        return view('airport.edit', compact('airport','countries'));
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

        return redirect()->route('airports.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Airport $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Airport $airport)
    {
        if ($airport->trips()->exists()) {
            Alert::toast('Airport has Trips  ', 'error')->position('top-end')->autoClose(5000);
        } else {
            Alert::toast('Airport has been  Deleted ', 'success')->position('top-end')->autoClose(5000);
            $airport->delete();
        }


        return redirect()->route('airports.index');
    }
}
