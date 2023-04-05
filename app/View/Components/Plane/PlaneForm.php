<?php

namespace App\View\Components\Plane;

use App\Models\Plane;
use Illuminate\View\Component;

class PlaneForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ?Plane $plane)
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
        return view('components.plane.plane-form');
    }
}
