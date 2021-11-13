<?php

namespace App\View\Components\code;

use Illuminate\View\Component;

class holiday extends Component
{
    public $holidayTypeData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($holidayTypeData)
    {
        $this->holidayTypeData = $holidayTypeData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.code.holiday');
    }
}
