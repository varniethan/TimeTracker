<?php

namespace App\View\Components\show;

use Illuminate\View\Component;

class shifts extends Component
{
    public $shiftData;
    public $breakTypeData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($shiftData, $breakTypeData)
    {
        $this->shiftData = $shiftData;
        $this->breakTypeData = $breakTypeData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show.shifts');
    }
}
