@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="container body">
            <div class="main_container">
                <x-navbar.account_pane/>
                <x-navbar.top_pane/>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div>
                        <x-create.employee
                            :cityData="$cityData"
                            :branchData="$branchData"
                            :positionData="$positionData"
                            :shiftTypeData="$shiftTypeData"
                            :invitationId="$invitationId"/>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <x-navbar.footer/>
                <!-- /footer content -->
            </div>
        </div>
    </div>
@endsection

