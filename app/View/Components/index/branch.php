<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class branch extends Component
{
    public $branchData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branchData)
    {
        $this->branchData = $branchData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.branch');
    }
}
