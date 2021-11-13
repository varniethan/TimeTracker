<?php

namespace App\View\Components\code;

use Illuminate\View\Component;

class branch_shift extends Component
{
    public $branchShiftTypeData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branchShiftTypeData)
    {
        $this->branchShiftTypeData = $branchShiftTypeData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.code.branch_shift');
    }
}
