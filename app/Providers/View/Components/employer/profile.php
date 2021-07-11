<?php

namespace App\View\Components\employer;

use App\Models\User;
use Illuminate\View\Component;

class profile extends Component
{
    public $employer;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($employer)
    {
        $this->employer = $employer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.employer.profile');
    }
}
