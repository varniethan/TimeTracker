@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-employer.all_employer_left_pane/>
            <x-employer.employer_top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                </div>
                <x-employer.view_all_company :organisation="$organisation"/>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbars.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

