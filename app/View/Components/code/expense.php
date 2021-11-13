<?php

namespace App\View\Components\code;

use Illuminate\View\Component;

class expense extends Component
{
    public $expenseTypeData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($expenseTypeData)
    {
        $this->expenseTypeData = $expenseTypeData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.code.expense');
    }
}
