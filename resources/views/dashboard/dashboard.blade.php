@extends('layouts.shift_app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left-pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <style>.row-margin-05 { margin-top: 5em; }</style>
                <div class="top_tiles row-margin-05">
                    @if((Session('$role_id') == 1 or Session('$role_id') == 2)and !Session::has('org_id'))
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Add your Organisations!</h4>
                            <p>Aww no, you have to add your organisations to countinue using TimeTracker!</p>
                            <hr>
                            <p class="mb-0">Got to <code>Manage Companies</code> in your profile - Manage Accounts section to add all of your Organisations</p>
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-sucess') }}">{{ Session::get('message') }}</p>
                    @endif
                </div>
                @if(Session::has('org_id'))
                <div>
                    <!-- top tiles -->
                    <div class="row" style="display: inline-block;" >
                        <div class="tile_count">
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Employees</span>
                                <div class="count">2500</div>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-clock-o"></i>Total Managing directors</span>
                                <div class="count">123.50</div>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Branch Managers</span>
                                <div class="count green">2,500</div>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Shift Managers</span>
                                <div class="count">4,567</div>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Hours Payed</span>
                                <div class="count">2,315</div>
                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Total Over time</span>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Salary</span>
                                <div class="count">7,325</div>
                            </div>
                        </div>
                    </div>
                    <!-- /top tiles -->
                    <br>

                    <!-- Greetings -->
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            @if(date('H') >= 0 and date('H') <= 6)
                                <h1>Early morning,</h1>
                            @elseif(date('H') >= 6 and date('H') <= 12)
                                <h1>Good morning,</h1>
                            @elseif(date('H') >= 12 and date('H') <= 17)
                                <h1>Good afternoon,</h1>
                            @elseif(date('H') >= 17 and date('H') <= 22)
                                <h1>Good evening,</h1>
                            @elseif(date('H') >= 22 and date('H') <= 24)
                                <h1>Go to bed!</h1>
                            @endif

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <h4>{{session()->get('first_name')}} {{session()->get('last_name')}}</h4>
                        </div>
                    </div>

                    <!-- /Greetings -->
                    <!--1st Row--->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="col-md-8">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Daily Hours<small>Worked Summary & Upcomming Shifts</small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Settings 1</a>
                                                    <a class="dropdown-item" href="#">Settings 2</a>
                                                </div>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <b>Today</b>
                                                </div>
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Employee</th>
                                                        <th scope="col">Hours</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    {{--                                          @foreach($breakTypeData as $breakType)--}}
                                                    {{--                                              <tr>--}}
                                                    {{--                                                  <th scope="row">{{$loop->iteration}}</th>--}}
                                                    {{--                                                  <td>{{$breakType->name}}</td>--}}
                                                    {{--                                                  <td>{{$breakType->description}}</td>--}}
                                                    {{--                                                  <td>{{$breakType->type}}</td>--}}
                                                    {{--                                                  <td>{{$breakType->hours}}  {{$breakType->mins}}</td>--}}
                                                    {{--                                                  <td>{{$breakType->can_end_earlier}}</td>--}}
                                                    {{--                                                  <td>{{$breakType->send_reminder}}</td>--}}
                                                    {{--                                                  <td>{{$breakType->prompt_when_hrs}} {{$breakType->prompt_when_mins}}</td>--}}
                                                    {{--                                              </tr>--}}
                                                    {{--                                          @endforeach--}}
                                                    @foreach($todayShiftData as $todayShift)
                                                        <tr id="sid{{$todayShift->date}}">
                                                            <td>{{$todayShift->name}}</td>
                                                            <td>{{$todayShift->duration}}</td>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <b>Tomorrow</b>
                                                </div>
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Employee</th>
                                                        <th scope="col">Hours</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($tomorrowShiftData as $tomorrowShift)
                                                        <tr id="sid{{$tomorrowShift->date}}">
                                                            <td>{{$tomorrowShift->name}}</td>
                                                            <td>{{$tomorrowShift->duration}}</td>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Recent Activities <small>Time Chat</small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Settings 1</a>
                                                    <a class="dropdown-item" href="#">Settings 2</a>
                                                </div>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="dashboard-widget-content">

                                            <ul class="list-unstyled timeline widget">
                                                @foreach($chatData as $ch_message)
                                                    <li>
                                                        <div class="block">
                                                            <div class="block_content">
                                                                <h2 class="title">
                                                                    <a>{{$ch_message->name}}</a>
                                                                </h2>
                                                                <div class="byline">
                                                                    <span>13 hours ago</span> by <a>Jane Smith</a>
                                                                </div>
                                                                <p class="excerpt">{{$ch_message->body}}<a>Read&nbsp;More</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach



                                                {{--                                            @foreach($messages as $message)--}}
{{--                                                <li>--}}
{{--                                                    <div class="block">--}}
{{--                                                        <div class="block_content">--}}
{{--                                                            <h2 class="title">--}}
{{--                                                                <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>--}}
{{--                                                            </h2>--}}
{{--                                                            <div class="byline">--}}
{{--                                                                <span>13 hours ago</span> by <a>Jane Smith</a>--}}
{{--                                                            </div>--}}
{{--                                                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
                                                {{--                                            @endforeach--}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/1st Row--->

                    <!--2nd Row--->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="col-md-8">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Over time watch <small>Get overtime alerts here</small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Settings 1</a>
                                                    <a class="dropdown-item" href="#">Settings 2</a>
                                                </div>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">Employee</th>
                                                <th scope="col">Contracted Hours</th>
                                                <th scope="col">Total Overtime (this week)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($overtimeData as $overtimeShift)
                                                <tr id="sid{{$overtimeShift->name}}">
                                                    <td>{{$overtimeShift->name}}</td>
                                                    <td>{{$overtimeShift->contracted_hours}}{{'Hrs'}}</td>
                                                    <td>{{$overtimeShift->worked_hours}}{{'Hrs'}}</td>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/2nd Row--->
                    <br />
                    <!--3rd Row--->
                    <!-- line graph -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="col-md-8">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Total Hours<small>Summary</small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Settings 1</a>
                                                    <a class="dropdown-item" href="#">Settings 2</a>
                                                </div>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content2">
                                        <div id="graph_line" style="width:100%; height:300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /line graph -->
                    <!--/3rd Row--->
                </div>
                @endif
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection
