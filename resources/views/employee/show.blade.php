@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.account_pane/>
            <x-navbar.top_pane/>
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

