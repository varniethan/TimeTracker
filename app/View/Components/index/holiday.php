<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class holiday extends Component
{
    public $branchData;
    public $positionData;
    public $employeeData;
    public $holidayTypeData;
    public $holidayData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branchData, $positionData, $employeeData, $holidayTypeData, $holidayData)
    {
        $this->branchData = $branchData;
        $this->positionData = $positionData;
        $this->employeeData = $employeeData;
        $this->holidayTypeData = $holidayTypeData;
        $this->holidayData = $holidayData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.holiday');
    }
}
