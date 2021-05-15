@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-employer.all_employer_left_pane/>
            <x-employer.employer_top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                    <x-employer.profile :employer="$employer"/>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbars.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

