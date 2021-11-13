@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.account-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                    {{--               The CORECT ONE!!!     <x-index.employee :employeeData="$employeeData" :positionData="$positionData" :branchData="$branchData"/>--}}
                    <x-show.organisation_shifts_employees :employeeData="$employeeData" :shiftData="$shiftData"/>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection
