<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftsController extends Controller
{

}


class OOpenShiftsController extends ShiftsController
{
    public function addShift()
    {
        parent::addShift(); // TODO: Change the autogenerated stub
    }

    public function endShift()
    {

    }
}

class OFullShiftsController extends ShiftsController
{

}
