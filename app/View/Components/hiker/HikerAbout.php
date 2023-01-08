<?php

namespace App\View\Components\hiker;

use Illuminate\View\Component;

class HikerAbout extends Component
{
    public $trail;
    public $trailList;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trail, $trailList)
    {
        $this->trail = $trail;
        $this->trailList = $trailList;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hiker.hiker-about');
    }
}
