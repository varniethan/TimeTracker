<div class="col-md-3 left_col  menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-clock-o"></i> <span>Time Tracker!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('images/profile/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2> {{$userData['first_name']}} {{$userData['last_name']}} </h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>Manage Account</h3>
                    <ul class="nav side-menu">
                        <li><a href="{{url('/dashboard')}}"><i class="fa fa-home"></i>Launchpad</a></li>
                        <li><a><i class="fa fa-user"> </i> Profile <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{url('/profile')}}"> View Profile</a></li>
                                <li><a href="{{url('/edit-profile')}}">Edit Profile</a></li>
                            </ul>
                        </li>
                        @if (Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3 or Session::get('role_id') == 4 or Session::get('role_id') == 5)
                        <li><a><i class="fa fa-bank"></i> Organisations <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @if (Session::has('org_id'))
                                    <li><a href="{{url('/organisation')}}">View Organisations</a></li>
                                @endif
                                @if (!Session::has('org_id'))
                                    <li><a href="{{url('/organisation/create')}}">Add Organisations</a></li>
                                @endif
                            </ul>
                        </li>
                        <li><a><i class="fa fa-building"></i> Branches <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @if (Session::has('org_id'))
                                    <li><a href="{{url('/branch')}}">View Branches</a></li>
                                @endif
                                @if (Session::get('role_id') == 1 or Session::get('role_id') == 2)
                                    <li><a href="{{url('/branch/create')}}">Add Branches</a></li>
                                @endif
                            </ul>
                        </li>

                        <li><a><i class="fa fa-group"></i> Employees <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @if (Session::has('org_id'))
                                    <li><a href="{{url('/employee')}}">View Employees</a></li>
                                @endif
                                @if (Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3 or Session::get('role_id') == 4)
                                    <li><a href="{{url('/employee/create')}}">Add Employees</a></li>
                                @endif
                            </ul>
                        </li>
                        <li><a><i class="fa fa-gavel"></i> Job Codes<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @if (Session::has('org_id'))
                                    <li><a href="{{url('/dashboard/account/positions')}}">Position Codes</a></li>
                                    <li><a href="{{url('/organisation_shifts')}}">Organisation Shifts</a></li>
                                    <li><a href="{{url('/dashboard/account/shift_designations')}}">Shift Tasks</a></li>
                                    <li><a href="{{url('/dashboard/account/branch_shift_designations')}}">Branch Shift Codes</a></li>
                                    <li><a href="{{url('/dashboard/account/expense_type')}}">Expense Codes</a></li>
                                @endif
                            </ul>
                        </li>

                        <li><a><i class="fa fa-gamepad"></i>Break & Holidays<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                @if (Session::has('org_id'))
                                    <li><a href="{{url('/dashboard/account/breaks')}}">Breaks</a></li>
                                    <li><a href="{{url('/dashboard/account/holiday_type')}}">Holidays</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
        </div>
        <!-- /sidebar menu -->
{{--                    @if (Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3 or Session::get('role_id') == 4 or Session::get('role_id') == 5)--}}
{{--                    <ul class="nav side-menu">--}}
{{--                        <li><a><i class="fa fa-bank"></i> Organisations <span class="fa fa-chevron-down"></span></a>--}}
{{--                            <ul class="nav child_menu">--}}
{{--                                @if (Session::has('org_id'))--}}
{{--                                    <li><a href="{{url('/organisation')}}">View Organisations</a></li>--}}
{{--                                @endif--}}
{{--                                @if (!Session::has('org_id'))--}}
{{--                                    <li><a href="{{url('/organisation/create')}}">Add Organisations</a></li>--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </li>--}}

{{--                        <li><a><i class="fa fa-building"></i> Branches <span class="fa fa-chevron-down"></span></a>--}}
{{--                            <ul class="nav child_menu">--}}
{{--                                @if (Session::has('org_id'))--}}
{{--                                    <li><a href="{{url('/branch')}}">View Branches</a></li>--}}
{{--                                @endif--}}
{{--                                @if (Session::get('role_id') == 1 or Session::get('role_id') == 2)--}}
{{--                                    <li><a href="{{url('/branch/create')}}">Add Branches</a></li>--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </li>--}}

{{--                        <li><a><i class="fa fa-group"></i> Employees <span class="fa fa-chevron-down"></span></a>--}}
{{--                            <ul class="nav child_menu">--}}
{{--                                @if (Session::has('org_id'))--}}
{{--                                    <li><a href="{{url('/employee')}}">View Employees</a></li>--}}
{{--                                @endif--}}
{{--                                @if (Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3 or Session::get('role_id') == 4)--}}
{{--                                    <li><a href="{{url('/employee/create')}}">Add Employees</a></li>--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    @endif--}}


        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{url('/logout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

{{--<x-navbar.top-pane/>--}}
