<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class organisation extends Component
{
    public $organisationData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($organisationData)
    {
        $this->organisationData = $organisationData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.organisation');
    }
}
