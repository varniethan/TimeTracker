@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="container body">
            <div class="main_container">
                <x-employer.all_employer_left_pane/>
                <x-employer.employer_top_pane/>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div>
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Employee Registration</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Employees <small>Details</small></h2>
                                    <!--
                                    <ul class="nav navbar-right panel_toolbox">
                                    </ul>-->
                                    <div class="clearfix"></div>
                                </div>
                                <x-forms.employee_create :cityData="$cityData"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <x-navbars.footer/>
                <!-- /footer content -->
            </div>
        </div>
    </div>
@endsection

