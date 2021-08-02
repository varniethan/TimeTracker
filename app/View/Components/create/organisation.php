<?php

namespace App\View\Components\create;

use Illuminate\View\Component;

class organisation extends Component
{
    public $countryData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($countryData)
    {
        $this->countryData = $countryData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.create.organisation');
    }
}
