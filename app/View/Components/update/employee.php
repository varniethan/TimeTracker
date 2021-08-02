<?php

namespace App\View\Components\update;

use Illuminate\View\Component;

class employee extends Component
{
    public $employeeData;
    public $countryData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employeeData, $countryData)
    {
        $this->employeeData = $employeeData;
        $this->countryData = $countryData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.update.employee');
    }
}
