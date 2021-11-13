<?php

namespace App\View\Components\code;

use Illuminate\View\Component;

class shift extends Component
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
        return view('components.code.shift');
    }
}
