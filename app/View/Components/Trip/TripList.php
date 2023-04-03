<?php

namespace App\View\Components\Trip;

use Illuminate\View\Component;

class TripList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $trips)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trip.trip-list');
    }
}
