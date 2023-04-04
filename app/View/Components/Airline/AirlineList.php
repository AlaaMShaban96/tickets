<?php

namespace App\View\Components\Airline;

use Illuminate\View\Component;

class AirlineList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $airlines)
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
        return view('components.airline.airline-list');
    }
}
