<div class="col-md-3 left_col">
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
                <h2>User Name</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="index.html"><i class="fa fa-home"></i>Launchpad</a></li>
                    <li><a><i class="fa fa-user"> </i> Profile <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/dashboard/profile')}}"> View Profile</a></li>
                            <li><a href="{{url('/dashboard/profile/edit')}}">Edit Profile</a></li>
                        </ul>
                    </li>
                    <li><a href="weChat.html"><i class="fa fa-wechat"></i>We Chat</a></li>
                </ul>
            </div>

            @if (Session::get('role_id') == 2)
                <div class="menu_section">
                    <h3>Company</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-cogs"></i> Manage <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="employeeProfile.html">View Company</a></li>
                                <li><a href="projects.html">Add Company</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                {{--@elseif (bar)
                    // do something else
                @else
                    // do some other thing;--}}
            @endif
            <x-navbar.track/>
            <x-navbar.reports/>
        </div>
        <!-- /sidebar menu -->

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
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
