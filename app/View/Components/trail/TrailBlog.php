<?php

namespace App\View\Components\trail;

use Illuminate\View\Component;

class TrailBlog extends Component
{
    public $trail;
    public $trailNotes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($trail, $trailNotes)
    {
        $this->trail = $trail;
        $this->trailNotes = $trailNotes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trail.trail-blog');
    }
}
