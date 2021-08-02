<?php

namespace App\View\Components\update;

use Illuminate\View\Component;

class branch extends Component
{
    public $branchData;
    public $organisationData;
    public $countryData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($branchData, $organisationData, $countryData)
    {
        $this->branchData = $branchData;
        $this->organisationData = $organisationData;
        $this->countryData = $countryData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.update.branch');
    }
}
