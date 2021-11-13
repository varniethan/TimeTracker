<?php

namespace App\View\Components\code;

use Illuminate\View\Component;

class organisation_shifts extends Component
{
    public $organisationShiftsData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($organisationShiftsData)
    {
        $this->organisationShiftsData = $organisationShiftsData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.code.organisation_shifts');
    }
}
