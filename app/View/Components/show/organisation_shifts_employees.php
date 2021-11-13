<?php

namespace App\View\Components\show;

use Illuminate\View\Component;

class organisation_shifts_employees extends Component
{
    public $employeeData;
    public $shiftData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeData, $shiftData)
    {
        $this->employeeData = $employeeData;
        $this->shiftData = $shiftData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show.organisation_shifts_employees');
    }
}
