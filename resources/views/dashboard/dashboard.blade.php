@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top-pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div>
                    @if(($role_id == 1 or $role_id == 2)and !Session::has('org_id'))
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Add your Organisations!</h4>
                            <p>Aww no, you have to add your organisations to countinue using TimeTracker!</p>
                            <hr>
                            <p class="mb-0">Got to <code>Manage Companies</code> to add all of your Organisations</p>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection

