@extends('layouts.app')

@section('content')
    <div class="container body">
        <div class="main_container">
            <x-navbar.left_pane/>
            <x-navbar.top_pane/>
            <!-- page content -->
            <div class="right_col" role="main">
                <div id="dashboard-summary">
                    <div id="summary-greeting" class="p-2">
                        <div class="text-center">
                            <h2>    Good Morning, ABCD
                            </h2>
                            <p class="font-size-16">
                                Congrats, all shifts have been approved!
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div id="overtime-watch" class="col-xs-12" data-overtime-watch="{&quot;start_date&quot;:&quot;2021-07-26&quot;,&quot;end_date&quot;:&quot;2021-08-01&quot;,&quot;overtime_multiplier&quot;:&quot;1.5&quot;,&quot;overtime_preference&quot;:&quot;none&quot;,&quot;overtime_threshold_weekly&quot;:null,&quot;overtime_threshold_daily&quot;:null,&quot;employees&quot;:{&quot;442560&quot;:{&quot;name&quot;:&quot;ABCD&quot;,&quot;week_regular_minutes&quot;:0,&quot;week_overtime_minutes&quot;:0,&quot;day_regular_minutes&quot;:0,&quot;day_overtime_minutes&quot;:0,&quot;running_timers&quot;:[]}}}">
                                    <div class="ibox">
                                        <div class="ibox-title">
                                            <h5>Overtime Watch</h5>
                                            <div class="ibox-tools">
                                                <a data-trigger="hover"
                                                   data-toggle="popover"
                                                   data-placement="auto top"
                                                   data-content="Weekly view of all employees at risk of overtime. Totals include overtime and double time hours."
                                                   class="mx-1"
                                                >
                                                    <i class="fa fa-question px-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ibox-content">
                                            <div class="no-overtime">
                                                <div class="content text-center">
                                                    <img alt="" src="/assets/sad-face-543b26fdb08a995f62a53e1d167223984507cff4b8cc7a1ad3b41af75639ab4c.svg" width="40" height="40" />
                                                    <br>
                                                    <br>
                                                    Oops, looks like Overtime
                                                    <br>
                                                    Preferences haven't been set yet.
                                                    <br>
                                                    <br>
                                                    <a class="btn btn-primary " href="/dashboard/settings/account/offices">Set Overtime Preferences</a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="icon"></th>
                                                        <th class="name">Name</th>
                                                        <th class="status">Status</th>
                                                        <th class="amount">Total Overtime (this week)</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr id="overtime-watch-row-template" style="display: none">
                                                        <td class="text-center icon">
                      <span class="checked-in" title="This employee is currently checked in">
                        <i class="fa fa-circle"></i>
                      </span>
                                                            <span class="not-checked-in">
                        <i class="fa fa-circle-thin"></i>
                      </span>
                                                        </td>
                                                        <td class="name"></td>
                                                        <td class="status"></td>
                                                        <td class="amount"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>      </div>
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="ibox">
                                        <div class="ibox-title">
                                            <h5>Daily Hours Worked Summary</h5>
                                            <div class="ibox-tools">
                                                <a data-trigger="hover" data-toggle="popover" data-placement="auto top" data-content="View how many hours each employee worked on a specific day" class="mx-1">
                                                    <i class="fa fa-question px-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ibox-content">

                                            <div class="row">

                                                <div id="today-summary" class="col-sm-6 daily-summary" data-summary="{&quot;start_date&quot;:&quot;2021-07-26&quot;,&quot;end_date&quot;:&quot;2021-08-01&quot;,&quot;overtime_multiplier&quot;:&quot;1.5&quot;,&quot;overtime_preference&quot;:&quot;none&quot;,&quot;overtime_threshold_weekly&quot;:null,&quot;overtime_threshold_daily&quot;:null,&quot;employees&quot;:{&quot;442560&quot;:{&quot;name&quot;:&quot;ABCD&quot;,&quot;week_regular_minutes&quot;:0,&quot;week_overtime_minutes&quot;:0,&quot;day_regular_minutes&quot;:0,&quot;day_overtime_minutes&quot;:0,&quot;running_timers&quot;:[]}}}">
                                                    <h6 class="text-center">
                                                        Today
                                                    </h6>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>Employee</th>
                                                                <th>Hours</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr class="row-template" style="display: none">
                                                                <td class="name"></td>
                                                                <td class="duration"></td>
                                                            </tr>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th class="employees"></th>
                                                                <th class="duration"></th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="comparison-summary" class="col-sm-6 daily-summary" data-summary="{&quot;start_date&quot;:&quot;2021-07-26&quot;,&quot;end_date&quot;:&quot;2021-08-01&quot;,&quot;overtime_multiplier&quot;:&quot;1.5&quot;,&quot;overtime_preference&quot;:&quot;none&quot;,&quot;overtime_threshold_weekly&quot;:null,&quot;overtime_threshold_daily&quot;:null,&quot;employees&quot;:{&quot;442560&quot;:{&quot;name&quot;:&quot;ABCD&quot;,&quot;week_regular_minutes&quot;:0,&quot;week_overtime_minutes&quot;:0,&quot;day_regular_minutes&quot;:0,&quot;day_overtime_minutes&quot;:0,&quot;running_timers&quot;:[]}}}">
                                                    <h6 class="text-center">
                                                        <div class="pull-right">
                                                            <a data-remote="true" href="/dashboard/summary?compare=2021-07-28&amp;direction=back">
                                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                            </a>  </div>
                                                        <div class="pull-left">
                                                            <a data-remote="true" href="/dashboard/summary?compare=2021-07-26&amp;direction=forward">
                                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                                            </a>  </div>
                                                        <div class="date  from-left">
                                                            Tuesday, July 27, 2021
                                                        </div>
                                                    </h6>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>Employee</th>
                                                                <th>Hours</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr class="row-template" style="display: none">
                                                                <td class="name"></td>
                                                                <td class="duration"></td>
                                                            </tr>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th class="employees"></th>
                                                                <th class="duration"></th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>              </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">

                            <div class="ibox mb-0">
                                <div class="ibox-title">
                                    <h5>Reminders</h5>
                                </div>
                                <div class="ibox-content ibox-widgets">
                                    <div class="widget reminder px-7 color-warning" id="invite-employees-reminder">
                                        <div class="text-center">
                                            <p>
                                                <i class="fa fa-user-circle-o fa-36"></i>
                                                <br>
                                            <h6 class="color-warning">Invite your team to start tracking time.</h6>
                                            <br>
                                            <a class="btn btn-warning" href="/dashboard/employees">Add Employees</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget reminder px-7 color-primary" id="review-timesheets-reminder">
                                        <div class="text-center">
                                            <p>
                                                <i class="fa fa-bell fa-36"></i>
                                                <br>
                                            <h6 class="color-primary">
                                                Your work week ends on 8/1/2021.
                                            </h6>
                                            <br>
                                            <a class="btn btn-primary" href="/dashboard/reports/timesheets">Review Timesheets</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget reminder px-7 color-success" id="annual-plan-reminder">
                                        <div class="text-center">
                                            <p>
                                                <i class="fa fa-tags fa-36"></i>
                                                <br>
                                            <h6 class="color-success">Try annual pricing and Save 20%.</h6>
                                            <br>
                                            <a class="btn btn-success" href="/dashboard/settings/account/billing?dialog=upgrade&amp;interval=annual">Upgrade Now</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="widget reminder px-7 color-info">
                                        <div class="text-center">
                                            <p>
                                                <i class="fa fa-gift fa-36"></i>
                                                <br>
                                            <h6 class="color-info">Refer someone to Justworks Hours and earn $50.</h6>
                                            <br>
                                            <a class="btn btn-info" href="/dashboard/settings/referrals/send_invites">Send Invites</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            </main>
        </div>

        <div class="footer fixed">
            <div class="text-right">
                <a target="_blank" href="https://www.justworkshours.com/terms">Terms of Service</a>
                &nbsp;|&nbsp;
                <a target="_blank" href="https://www.justworkshours.com/privacy">Privacy Policy</a>
            </div>

        </div>

    </div>

    </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <x-navbar.footer/>
            <!-- /footer content -->
        </div>
    </div>
@endsection






