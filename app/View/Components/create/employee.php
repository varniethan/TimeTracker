<?php

namespace App\View\Components\create;

use Illuminate\View\Component;

class employee extends Component
{
    public $cityData;
    public $branchData;
    public $positionData;
    public $invitationId;
    public $shiftTypeData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cityData, $branchData, $positionData, $invitationId, $shiftTypeData)
    {
        $this->cityData = $cityData;
        $this->branchData = $branchData;
        $this->positionData = $positionData;
        $this->invitationId = $invitationId;
        $this->shiftTypeData = $shiftTypeData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.create.employee');
    }
}
