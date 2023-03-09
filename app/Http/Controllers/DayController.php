<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayStoreRequest;
use App\Http\Requests\DayUpdateRequest;
use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $days = Day::all();

        return view('day.index', compact('days'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('day.create');
    }

    /**
     * @param \App\Http\Requests\DayStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DayStoreRequest $request)
    {
        $day = Day::create($request->validated());

        $request->session()->flash('day.id', $day->id);

        return redirect()->route('day.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Day $day
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Day $day)
    {
        return view('day.show', compact('day'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Day $day
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Day $day)
    {
        return view('day.edit', compact('day'));
    }

    /**
     * @param \App\Http\Requests\DayUpdateRequest $request
     * @param \App\Models\Day $day
     * @return \Illuminate\Http\Response
     */
    public function update(DayUpdateRequest $request, Day $day)
    {
        $day->update($request->validated());

        $request->session()->flash('day.id', $day->id);

        return redirect()->route('day.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Day $day
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Day $day)
    {
        $day->delete();

        return redirect()->route('day.index');
    }
}
