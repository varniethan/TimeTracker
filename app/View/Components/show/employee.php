<?php

namespace App\View\Components\show;

use Illuminate\View\Component;

class employee extends Component
{
    public $employeeData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeData)
    {
        $this->employeeData = $employeeData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show.employee');
    }
}
