<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class break_type extends Component
{
    public $breakTypeData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breakTypeData)
    {
        $this->breakTypeData = $breakTypeData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.break_type');
    }
}
