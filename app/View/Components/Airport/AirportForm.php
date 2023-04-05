<?php

namespace App\View\Components\Airport;

use App\Models\Airport;
use Illuminate\View\Component;

class AirportForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ?Airport $airport ,public  $countries)
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
        return view('components.airport.airport-form');
    }
}
