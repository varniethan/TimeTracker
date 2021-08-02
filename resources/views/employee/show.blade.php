@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.account-pane/>
            <x-navbar.top-pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                    <x-show.employee :employeeData="$employeeData"/>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

