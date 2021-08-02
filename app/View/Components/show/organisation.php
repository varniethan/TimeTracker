<?php

namespace App\View\Components\show;

use Illuminate\View\Component;

class organisation extends Component
{
    public $branchData;
    public $organisationData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branchData, $organisationData)
    {
        $this->branchData = $branchData;
        $this->organisationData = $organisationData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show.organisation');
    }
}
