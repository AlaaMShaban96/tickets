<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaneStoreRequest;
use App\Http\Requests\PlaneUpdateRequest;
use App\Models\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $planes = Plane::all();

        return view('plane.index', compact('planes'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('plane.create');
    }

    /**
     * @param \App\Http\Requests\PlaneStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaneStoreRequest $request)
    {
        $plane = Plane::create($request->validated());

        $request->session()->flash('plane.id', $plane->id);

        return redirect()->route('plane.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Plane $plane
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Plane $plane)
    {
        return view('plane.show', compact('plane'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Plane $plane
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Plane $plane)
    {
        return view('plane.edit', compact('plane'));
    }

    /**
     * @param \App\Http\Requests\PlaneUpdateRequest $request
     * @param \App\Models\Plane $plane
     * @return \Illuminate\Http\Response
     */
    public function update(PlaneUpdateRequest $request, Plane $plane)
    {
        $plane->update($request->validated());

        $request->session()->flash('plane.id', $plane->id);

        return redirect()->route('plane.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Plane $plane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Plane $plane)
    {
        $plane->delete();

        return redirect()->route('plane.index');
    }
}
