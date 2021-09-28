<!-- page content -->
<div class="page-title">
    <div class="title_left">
        <h3>Current Shift<small> details</small></h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Analysis</h2>
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
                <div class="col-md-9 col-sm-9  ">
                    <ul class="stats-overview">
                        <li>
                            <span class="name"> Total hours today </span>
                            <span class="value text-success"> 2300 </span>
                        </li>
                        <li>
                            <span class="name"> No of staffs available now </span>
                            <span class="value text-success"> 2000 </span>
                        </li>
                        <li class="hidden-phone">
                            <span class="name"> Estimated todays cost </span>
                            <span class="value text-success"> 20 </span>
                        </li>
                    </ul>
                    <br />

                    <!-- /thrid row with boxes -->
                    <div class="row">
                        <!---Shift Progress--->
                        <div class="col-md-4 col-sm-4 ">
                            <div class="x_panel tile fixed_height_320">
                                <div class="x_title">
                                    <h2>Shift Progress</h2>
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
                                    <h4>Progress so far......</h4>
                                    <div class="widget_summary">
                                        <div class="w_left w_25">
                                            <span>0.1.5.2</span>
                                        </div>
                                        <div class="w_center w_55">
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w_right w_20">
                                            <span>123k</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="dashboard-widget-content">
                                        <ul class="quick-list">
                                            <li><i class="fa fa-calendar-o"></i>Day Total
                                            </li>
                                            <li><i class="fa fa-bars"></i>Week Total</li>
                                            <li><i class="fa fa-bar-chart"></i>Month Total</li>
                                            <li><i class="fa fa-bar-chart"></i>Shift Break</li>
                                            <li><i class="fa fa-line-chart"></i>Shift Cost</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!---Shift Quick Actions--->
                        <div class="col-md-4 col-sm-4 ">
                            <div class="x_panel tile fixed_height_320">
                                <div class="x_title">
                                    <h2>Quick Actions</h2>
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
                                        <ul class="quick-list">
                                            <a href="#" class="btn btn-outline-primary btn-lg" id="break-btn" role="button" aria-disabled="true">Take break</a>
                                            <div id="shift_types">
                                                @foreach($breakTypeData as $breakType)
                                                <button class="break_type" id="break" value={{$breakType->id}}>{{$breakType->name}}</button>
                                                @endforeach
                                            </div>
                                            <a href="{{url('/chat')}}" class="btn btn-outline-success btn-lg" role="button" aria-disabled="true">Go to Chat</a>
                                            <a href="#" class="btn change_task_btn btn-outline-info btn-lg" id="change_task_btn" role="button" aria-disabled="true">Chanage Shift Tasks</a>
                                            <a href="#" class="btn end_shift_btn btn-outline-warning btn-lg" id="end_shift_btn" role="button" aria-disabled="true">End Shift Earley</a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!---Shift Tasks--->
                        <div class="col-md-4 col-sm-4 ">
                            <div class="x_panel tile fixed_height_320 overflow_hidden">
                                <div class="x_title">
                                    <h2>Shift Tasks</h2>
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
                                    <table class="" style="width:100%">
                                        <tr>
                                            <th style="width:37%;">
                                                <p>Tasks Today</p>
                                            </th>
                                            <th>
                                                <div class="col-lg-7 col-md-7 col-sm-7 ">
                                                    <p class="">Task Name</p>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 ">
                                                    <p class="">Progress</p>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                                            </td>
                                            <td>
                                                <table class="tile_info">
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square blue"></i>IOS </p>
                                                        </td>
                                                        <td>30%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square green"></i>Android </p>
                                                        </td>
                                                        <td>10%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square purple"></i>Blackberry </p>
                                                        </td>
                                                        <td>20%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square aero"></i>Symbian </p>
                                                        </td>
                                                        <td>15%</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p><i class="fa fa-square red"></i>Others </p>
                                                        </td>
                                                        <td>30%</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!---Chatter--->
                    <div>
                        <h5>Shift Message From Manager</h5>
                        <!-- end of user messages -->
                        <ul class="messages">
                            <li>
                                <img src="images/img.jpg" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">{{$shiftData['shift_note']}}</blockquote>
                                    <br />
                                </div>
                            </li>
                        </ul>
                        <!-- end of user messages -->
                    </div>
                    <!---End of Chatter--->


                    <!---Manager Details--->
                    <h5>Manager Details</h5>
                    <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h4 class="brief"><i>Digital Strategist</i></h4>
                                <div class="left col-sm-7">
                                    <h2>Nicole Pearson</h2>
                                </div>
                                <div class="right col-sm-5 text-center">
                                    <img src=" {{ asset('images/profile/img.jpg') }}" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                            <div class=" profile-bottom">
                                <div class=" col-sm-6 emphasis">
                                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                    <a href="{{ URL::to('branch/' .$shiftData['id']) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                                    <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                                    <a href="{{ URL::to('branch/' . $shiftData['id'] . '/edit') }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i></button></a>
                                    <x-button.remove/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of Manager Details -->
                </div>

                <!-- start project-detail sidebar -->
                <div class="col-md-3 col-sm-3  ">

                    <section class="panel">

                        <div class="x_title">
                            <h2>Shift Description</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <h3 class="green"><i class="fa fa-clock-o"></i> {{$shiftData['shift_type_id']}}</h3>
                            <p>Here are the details we have.....</p>
                            <form class="form-label-left input_mask">
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>ID</b>
                                    </div>
                                    <div class="col-md-9 col-sm-9 form-group has-feedback">
                                        <input type="text" class="form-control shift_id" id="inputSuccess3, shift_id" readonly="readonly" placeholder="{{$shiftData['id']}}">
                                        <span class="fa  fa-credit-card  form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Name</b>
                                    </div>
                                    <div class="col-md-9 col-sm-9 form-group has-feedback">
                                        <input type="text" class="form-control" id="inputSuccess3" readonly="readonly" placeholder="{{$shiftData['user_id']}}">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Branch Name</b>
                                    </div>

                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$shiftData['branch_shift_id']}}">
                                    <span class="fa fa-building form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Organisation Name</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$shiftData['organisation_id']}}">
                                    <span class="fa fa-bank form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Shift Type</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$shiftData['full_or_open']}}">
                                    <span class="fa fa-clock-o form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Approved?</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$shiftData['approved']}}">
                                    <span class="fa fa-check form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Address 1</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$shiftData['branch_shift_id']}}">
                                    <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Address 2</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$shiftData['branch_shift_id']}}">
                                    <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>

                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Postal Code</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$shiftData['branch_shift_id']}}">
                                    <span class="fa fa-road form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>City</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$shiftData['branch_shift_id']}}">
                                    {{--                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{\App\Models\City::getCityName($shiftData['city'])}}">--}}
                                    <span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </form>

                            <br />
                        </div>

                    </section>

                </div>
                <!-- end project-detail sidebar -->

            </div>
        </div>
    </div>
</div>
<!-- /page content -->
