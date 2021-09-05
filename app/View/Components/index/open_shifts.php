<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class open_shifts extends Component
{
    public $branchData;
    public $positionData;
    public $employeeData;
    public $shiftTypeData;
    public $openShiftData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branchData, $positionData, $employeeData, $shiftTypeData, $openShiftData)
    {
        $this->branchData = $branchData;
        $this->positionData = $positionData;
        $this->employeeData = $employeeData;
        $this->shiftTypeData = $shiftTypeData;
        $this->openShiftData = $openShiftData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.open_shifts');
    }
}
