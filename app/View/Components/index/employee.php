<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class employee extends Component
{
    public $employeeData;
    public $positionData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeData, $positionData)
    {
        $this->employeeData = $employeeData;
        $this->positionData = $positionData;
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
