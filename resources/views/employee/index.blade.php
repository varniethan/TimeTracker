@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-employer.employer_left_pane/>
            <x-employer.employer_top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                    <x-view.all_employee_profile/>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbars.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection
