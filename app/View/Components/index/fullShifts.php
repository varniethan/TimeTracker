<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class fullShifts extends Component
{
    public $branchData;
    public $positionData;
    public $employeeData;
    public $shiftTypeData;
    public $fullShiftData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branchData, $positionData, $employeeData, $shiftTypeData, $fullShiftData)
    {
        $this->branchData = $branchData;
        $this->positionData = $positionData;
        $this->employeeData = $employeeData;
        $this->shiftTypeData = $shiftTypeData;
        $this->fullShiftData = $fullShiftData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.full-shifts');
    }
}
