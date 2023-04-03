<?php

namespace App\View\Components\Trip;

use App\Models\Trip;
use Illuminate\View\Component;

class TripForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ?Trip $trip,public $airports,public $days,public $planes,public $airlines )
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
        return view('components.trip.trip-form');
    }
}
