<?php

namespace App\View\Components\FlightBooking;

use Illuminate\View\Component;

class FlightList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $trips, public int $numberOfadult=1,public  int $numberOfChildren=0)
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
        return view('components.flight-booking.list');
    }
}
