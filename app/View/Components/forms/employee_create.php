<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class employee_create extends Component
{
    public $cityData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cityData)
    {
        $this->cityData = $cityData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.employee_create');
    }
}
