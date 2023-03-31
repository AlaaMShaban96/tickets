<?php

namespace App\View\Components\FlightBooking;

use App\Models\Airport;
use App\Models\SeatType;
use Illuminate\View\Component;

class FlightBookingSearch extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $seatTypes,$airports;
    public function __construct()
    {
        $this->seatTypes=SeatType::all();
        $this->airports= Airport::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.flight-booking.flight-booking-search');
    }
}
