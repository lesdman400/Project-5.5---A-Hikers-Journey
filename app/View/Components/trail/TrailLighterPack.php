<?php

namespace App\View\Components\trail;

use Illuminate\View\Component;

class TrailLighterPack extends Component
{
    public $trail;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trail)
    {
        //
        $this->trail = $trail;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trail.trail-lighter-pack');
    }
}
