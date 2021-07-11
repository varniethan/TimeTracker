<?php

namespace App\View\Components\update;

use Illuminate\View\Component;

class user extends Component
{
    public $userData;
    public $countryData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userData, $countryData)
    {
        $this->userData = $userData;
        $this->countryData = $countryData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.update.user');
    }
}
