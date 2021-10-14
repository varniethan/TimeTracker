<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class automatic_shifts extends Component
{
    public $shiftData;
    public $branchData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($shiftData, $branchData)
    {
        $this->shiftData = $shiftData;
        $this->branchData = $branchData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.automatic_shifts');
    }
}
