<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class holiday_type extends Component
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
        return view('components.index.holiday_type');
    }
}
