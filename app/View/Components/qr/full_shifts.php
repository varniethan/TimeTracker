<?php

namespace App\View\Components\qr;

use Illuminate\View\Component;

class full_shifts extends Component
{
    public $branchData;
    public $positionData;
    public $employeeData;
    public $shiftTypeData;
    public $todayShiftData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branchData, $positionData, $employeeData, $shiftTypeData, $todayShiftData)
    {
        $this->branchData = $branchData;
        $this->positionData = $positionData;
        $this->employeeData = $employeeData;
        $this->shiftTypeData = $shiftTypeData;
        $this->todayShiftData = $todayShiftData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.qr.full_shifts');
    }
}
