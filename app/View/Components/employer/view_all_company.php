<?php

namespace App\View\Components\employer;

use Illuminate\View\Component;

class view_all_company extends Component
{
    public $organisation;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($organisation)
    {
        $this->organisation = $organisation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employer.view_all_company');
    }
}
