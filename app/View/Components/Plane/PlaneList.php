<?php

namespace App\View\Components\Plane;

use Illuminate\View\Component;

class PlaneList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $planes)
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
        return view('components.plane.plane-list');
    }
}
