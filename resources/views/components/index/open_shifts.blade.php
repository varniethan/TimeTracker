<div class="page-title">
    <div class="col-md-4">
        <div class="title_left"><h3>Open Time Sheets</h3></div>
    </div>
    <div class="col-md-3">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-sucess') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
</div>
<div class="clearfix"></div>

<style>.grey-bg { background-color: rgb(248,248,249);}</style>
<div class="modal-body row">
    {{--    Left Side Bar--}}
    <div class="col-md-2">
        <div class="x_panel grey-bg">
            <div class="x_title">
                <!--Heading and reset button row-->
                <div class="row">
                    <div class="col-md-10">
                        <h4>Filter <small>your time sheet</small></h4>
                    </div>
                    <div class="col-md-2 form-group">
                        <div class="col-sm emphasis">
                            <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                            <a href="{{url('/full_shifts')}}"><button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-refresh"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="" method="post" action="{{ route('full-shifts-filter') }}">
                @csrf
                {{--            From Row--}}
                <style>.row-margin-05 { margin-top: 2.5em; }</style>
                <div class="row  row-margin-05">
                    <div class="col-md-2">
                        <label class="col-form-label text-left"><b>From</b></label>
                    </div>
                    <div class="col-md-10">
                        <input type="date" name="from_date"   class="form-control date" value="{{old('from_date')}}">
                    </div>
                </div>
                {{--            To Row--}}
                <style>.row-margin-01 { margin-top: 1.5em; }</style>
                <div class="row row-margin-01">
                    <div class="col-md-2">
                        <label class="col-form-label text-left"><b>To</b></label>
                    </div>
                    <div class="col-md-10">
                        <input type="date" name="to_date"   class="form-control date" value="{{old('to_date')}}">
                    </div>
                </div>
                {{--            Branch Row--}}
                <div class="row row-margin-01">
                    <h2>Select Branch - <small>location worked?</small></h2>
                    <div class="col-md-2">
                        <label class="col-form-label text-left"><b>Branch</b></label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-select" name='branch_id' aria-label=".form-select-sm example" value="{{old('branch_id')}}">
                            <option value='0'>{{"All Branches"}}</option>
                            @foreach($branchData as $branch)
                                <option value='{{$branch['id']}}'>{{$branch['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ((Session::get('role_id') == 1 or Session::get('role_id') == 2) and Session::has('org_id'))
                    {{--            Employee Row--}}
                    <div class="row row-margin-01">
                        <h2>Select Employee - <small>Employee name?</small></h2>
                        <div class="col-md-2">
                            <label class="col-form-label text-left"><b>Name </b></label>
                        </div>
                        <div class="col-md-10">
                            <select class="form-select" name='user_id' aria-label=".form-select-sm example" value="{{old('user_id')}}">
                                <option value='0'>{{"All Employees"}}</option>
                                @foreach($employeeData as $employee)
                                    <option value='{{$employee->id}}'>{{$employee->first_name}} {{$employee->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{--            Role Row--}}
                    <div class="row row-margin-01">
                        <h2>Select Role - <small>Job title of the employee?</small></h2>
                        <div class="col-md-2">
                            <label class="col-form-label text-left"><b>Role </b></label>
                        </div>
                        <div class="col-md-10">
                            <select class="form-select" name='role_id' aria-label=".form-select-sm example" value="{{old('role_id')}}">
                                <option value='0'>{{"All Roles"}}</option>
                                @if (Session::get('role_id') == 1 or Session::get('role_id') == 2)
                                    <option value="3">Managing Director</option>
                                    <option value="4">Branch Manager</option>
                                    <option value="5">Shift Manager</option>
                                    <option value="6">Employee</option>
                                @elseif(Session::get('role_id') == 3)
                                    <option value="4">Branch Manager</option>
                                    <option value="5">Shift Manager</option>
                                    <option value="6">Employee</option>
                                @elseif(Session::get('role_id') == 4)
                                    <option value="5">Shift Manager</option>
                                    <option value="6">Employee</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    {{--            Position Row--}}
                    <div class="row row-margin-01">
                        <h2>Select Position - <small>What does the employee do?</small></h2>
                        <div class="col-md-2">
                            <label class="col-form-label text-left"><b>Position </b></label>
                        </div>
                        <div class="col-md-10">
                            @if(count($positionData) < 1)
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Add your employee Positions!</h4>
                                    <p>Aww no, you have to add your employee Positions to countinue adding employees!</p>
                                    <hr>
                                    <p class="mb-0">Got to <code>Job Codes</code> to add all the employee Positions</p>
                                </div>
                            @else
                                <select class="form-select" name='position_id' aria-label=".form-select-sm example" value="{{old('position_id')}}">
                                    <option value='0'>{{"All Position Type"}}</option>
                                    @foreach($positionData as $position)
                                        <option value='{{$position['id']}}'>{{$position['name']}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                @endif
                {{--            Employee Did Row--}}
                <div class="row row-margin-01">
                    <h2>Select Shift Type - <small>What employee did?</small></h2>
                    <div class="col-md-2">
                        <label class="col-form-label text-left"><b>Shift Type </b></label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-select" name='shift_type_id' aria-label=".form-select-sm example" value="{{old('shift_type_id')}}">
                            <option value='0'>{{"All Shift Type"}}</option>
                            @foreach($shiftTypeData as $shiftType)
                                <option value="{{$shiftType->id}}">{{$shiftType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row row-margin-01 col-sm emphasis">
                    <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                    <button type="submit" class="btn btn-outline-success pull-right"><i class="fa fa-filter"></i> Apply Filter</button>
                </div>
            </form>
        </div>
    </div>

    {{--    Right Side Bar--}}
    <div class="col-md-10">
        <div class="x_panel">
            <div class="x_title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_open_shift" data-whatever="@getbootstrap">Track Time</button>
                <div class="modal fade" id="add_open_shift" tabindex="-1" role="dialog" aria-labelledby="addOpenShiftLabel" aria-hidden="true">
                    <div class="modal-dialog modal-s" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addShiftLabel">Track Time</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="uploadTab">
                                            <form method="POST" action="{{url('/open_shifts')}}" class="form-horizontal form-label-left" id="openTab">
                                                @csrf
                                                <div class="row form-group row-margin-05">
                                                    <div class="col-md-3">
                                                        <label class="col-form-label text-left"><b>Location</b></label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <select class="form-select" name='branch_shift_id' aria-label=".form-select-sm example">
                                                            @foreach($branchData as $branch)
                                                                <option value='{{$branch['id']}}'>{{$branch['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row form-group row-margin-05">
                                                    <div class="col-md-3">
                                                        <label class="col-form-label text-left"><b>Shift Type</b></label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <select class="form-select" name='shift_type_id' aria-label=".form-select-sm example">
                                                            @foreach($shiftTypeData as $shiftType)
                                                                <option value="{{$shiftType->id}}">{{$shiftType->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row form-group row-margin-05">
                                                    <div class="col-md-3">
                                                        <label class="col-form-label text-left"><b>Employee</b></label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <select class="form-select" name='user_id' aria-label=".form-select-sm example">
                                                            @foreach($employeeData as $employee)
                                                                <option value="{{$employee->id}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row form-group row-margin-05">
                                                    <div class="col-md-3">
                                                        <label class="col-form-label text-left"><b>Date</b></label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        {{ date('d/m/Y') }}
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col-md-3">
                                                        <label class="col-form-label text-left"><b>Check In</b></label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <iframe src="https://free.timeanddate.com/clock/i7xt82e6/n297/tluk/fn7/fs20/tct/pct/ftb/th2" frameborder="0" width="130" height="28" allowtransparency="true"></iframe>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" value="Start" class="btn btn-primary ">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-dark" id="endAllSelectedRecord">End Shifts</a>
                @if ((Session::get('role_id') == 1 or Session::get('role_id') == 2) and Session::has('org_id'))
                <a href="#" class="btn btn-primary" id="approveAllSelectedRecord">Approve Shifts</a>
                <a href="#" class="btn btn-warning" id="unapproveAllSelectedRecord">Unapprove Shifts</a>
                <a href="#" class="btn btn-danger" id="deleteAllSelectedRecord"><i class="fa fa-trash-o"></i></a>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col"><input type="checkbox" name="ids" id="chkCheckAll"></th>
                    <th scope="col">Date</th>
                    <th scope="col">Shift Type</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Location</th>
                    <th scope="col">Punch In</th>
                    <th scope="col">Punch Out</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Break Time</th>
                    <th scope="col">Paid Time</th>
                    <th scope="col">Paid Rate</th>
                    <th scope="col">Pay Total</th>
                    <th scope="col"><b>Actions</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($openShiftData as $openShift)
                    <tr id="sid{{$openShift->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td><input type="checkbox" id="checkbox" name="ids" class="checkBox_class" value={{$openShift->id}}></td>
                        <td>{{$openShift->date}}</td>
                        @if($openShift->clock_in ==' ')
                            <td><i class="fa fa-ban"></i></td>
                        @else
                            <td>{{$openShift->shift_type_name}}</td>
                        @endif
                        <td>{{$openShift->user_name}}</td>
                        <td>{{$openShift->branch_name}}</td>
                        @if($openShift->clock_in == '00:00:00')
                            <td><i class="fa fa-bell-slash"></i></td>
                        @else
                            <td>{{$openShift->clock_in}}</td>
                        @endif
                        @if($openShift->clock_out == '')
                            <td><i class="fa fa-hourglass-end"></i></td>
                        @else
                            <td>{{$openShift->clock_out}}</td>
                        @endif
                        <td>{{$openShift->duration}}</td>
                        <td>{{$openShift->shift_break}}</td>
                        <td>{{$openShift->duration}}</td>
                        @if($openShift->rate == '')
                            <td><i class="fa fa-ban"></i></td>
                        @else
                            <td>{{"£"}}{{$openShift->rate}}</td>
                        @endif
                        @if($openShift->total_pay == '')
                            <td><i class="fa fa-ban"></i></td>
                        @else
                            <td>{{'£'}}{{$openShift->total_pay}}</td>
                        @endif
                        <td>
                            <div class="col-sm emphasis">
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="{{ URL::to('/full_shifts/' .$openShift->id) }}"><button type="button" class="btn btn-success btn-sm" disabled><i class="fa fa-eye"></i></button></a>
                                    </div>
                                    @if ((Session::get('role_id') == 1 or Session::get('role_id') == 2) and Session::has('org_id'))
                                        <div class="col-md-2">
                                            @if ($openShift->approved == 1)
                                                <a href="{{ URL::to('/full_shifts/approve/' .$openShift->id) }}"><button type="button" class="btn btn-primary btn-sm" disabled><i class="fa fa-thumbs-o-up"></i></button></a>
                                            @else
                                                <a href="{{ URL::to('/full_shifts/approve/' .$openShift->id) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-o-up"></i></button></a>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            @if ($openShift->approved == 0)
                                                <a href="{{ URL::to('/full_shifts/unapprove/' .$openShift->id) }}"><button type="button" class="btn btn-warning btn-sm" disabled><i class="fa fa-times-circle"></i></button></a>
                                            @else
                                                <a href="{{ URL::to('/full_shifts/unapprove/' .$openShift->id) }}"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-times-circle"></i></button></a>
                                            @endif
                                        </div>
                                    @endif
                                        <div class="col-md-2">
                                            <form method="POST" action="/timeTracker/public/full_shifts/{{$openShift->id}}">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


