<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class employee extends Component
{
    public $employeeData;
    public $positionData;
    public $branchData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeData, $positionData, $branchData)
    {
        $this->employeeData = $employeeData;
        $this->positionData = $positionData;
        $this->branchData = $branchData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.employee');
    }
}
