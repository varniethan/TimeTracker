<?php

namespace App\View\Components\index;

use Illuminate\View\Component;

class profile extends Component
{
    public $userData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.profile');
    }
}
