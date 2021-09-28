@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                </div>
{{--                <x-index.organisation :organisationnData="$organisationData"/>--}}
                <x-index.optimisation/>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

