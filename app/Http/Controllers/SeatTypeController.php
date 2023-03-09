<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeatTypeStoreRequest;
use App\Http\Requests\SeatTypeUpdateRequest;
use App\Models\SeatType;
use Illuminate\Http\Request;

class SeatTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $seatTypes = SeatType::all();

        return view('seatType.index', compact('seatTypes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('seatType.create');
    }

    /**
     * @param \App\Http\Requests\SeatTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeatTypeStoreRequest $request)
    {
        $seatType = SeatType::create($request->validated());

        $request->session()->flash('seatType.id', $seatType->id);

        return redirect()->route('seatType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SeatType $seatType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SeatType $seatType)
    {
        return view('seatType.show', compact('seatType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SeatType $seatType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SeatType $seatType)
    {
        return view('seatType.edit', compact('seatType'));
    }

    /**
     * @param \App\Http\Requests\SeatTypeUpdateRequest $request
     * @param \App\Models\SeatType $seatType
     * @return \Illuminate\Http\Response
     */
    public function update(SeatTypeUpdateRequest $request, SeatType $seatType)
    {
        $seatType->update($request->validated());

        $request->session()->flash('seatType.id', $seatType->id);

        return redirect()->route('seatType.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SeatType $seatType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SeatType $seatType)
    {
        $seatType->delete();

        return redirect()->route('seatType.index');
    }
}
