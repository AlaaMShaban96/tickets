<?php

namespace App\View\Components\Dashboaed;

use Illuminate\View\Component;

class TicketList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $tickets)
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
        return view('components.dashboaed.ticket-list');
    }
}
