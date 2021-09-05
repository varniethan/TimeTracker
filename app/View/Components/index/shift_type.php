<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class shift_type extends Component
{
    public $shiftTypeData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($shiftTypeData)
    {
        $this->shiftTypeData = $shiftTypeData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.shift_type');
    }
}
