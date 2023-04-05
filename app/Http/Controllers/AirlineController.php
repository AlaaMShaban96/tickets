<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AirlineStoreRequest;
use App\Http\Requests\AirlineUpdateRequest;

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
        if ($request->hasFile('logo_upload')) {
            $request['logo'] = $request->logo_upload->store('public/airlines');
        }
        $airline = Airline::create([
            'name'=>$request->name,
            'logo'=>$request->logo,
        ]);
        // dd($airline);

        $request->session()->flash('airline.id', $airline->id);

        return redirect()->route('airlines.index');
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
        if ($request->hasFile('logo_upload')) {
            $request['logo'] = $request->logo_upload->store('public/airlines');
        }else {
            $request['logo']=$airline->logo;
        }
        $airline->update([
            'name'=>$request->name,
            'logo'=>$request->logo,
        ]);

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
        if ($airline->trips()->exists()) {
            Alert::toast('Airline has Trips  ', 'error')->position('top-end')->autoClose(5000);
        } else {
            Alert::toast('Airline has been  Deleted ', 'success')->position('top-end')->autoClose(5000);
            $airline->delete();
        }

         return redirect()->route('airlines.index');
    }
}
