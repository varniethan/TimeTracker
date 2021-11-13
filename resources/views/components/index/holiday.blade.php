<div class="page-title">
    <div class="title_left">
        <h3>Holiday Sheet</h3>
    </div>
    <div class="col-md-3">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-sucess') }}">{{ Session::get('message') }}</p>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
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
                        <h4>Filter <small>your holiday sheet</small></h4>
                    </div>
                    <div class="col-md-2 form-group">
                        <div class="col-sm emphasis">
                            <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                            <a href="{{url('/employee/holiday/create')}}"><button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-refresh"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
            <style>.row-margin-01 { margin-top: 1.5em; }</style>
            {{--            Status Row--}}
            <div class="row row-margin-01">
                <h2>Select Status - <small>Approved or Unapproved?</small></h2>
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>Status</b></label>
                </div>
                <div class="col-md-10">
                    <select class="form-select" name='position_id' aria-label=".form-select-sm example">
                        <option value='0'>{{"All Status"}}</option>
                        <option value='1'>{{"Approved"}}</option>
                        <option value='2'>{{"Unapproved"}}</option>
                    </select>
                </div>
            </div>
            {{--            Holiday Type Row--}}
            <div class="row row-margin-01">
                <h2>Select Holiday Code - <small>Type of Holiday?</small></h2>
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>Code</b></label>
                </div>
                <div class="col-md-10">
                    <select class="form-select" name='position_id' aria-label=".form-select-sm example">
                        <option value='0'>{{"All Holiday Codes"}}</option>
                        {{--                        @foreach($branchData as $branch)--}}
                        {{--                            <option value='{{$branch['id']}}'>{{$branch['name']}}</option>--}}
                        {{--                        @endforeach--}}
                    </select>
                </div>
            </div>
            {{--            Branch Row--}}
            <div class="row row-margin-01">
                <h2>Select Branch - <small>Location worked?</small></h2>
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>Branch</b></label>
                </div>
                <div class="col-md-10">
                    <select class="form-select" name='position_id' aria-label=".form-select-sm example">
                        <option value='0'>{{"All Branches"}}</option>
                                                @foreach($branchData as $branch)
                                                    <option value='{{$branch['id']}}'>{{$branch['name']}}</option>
                                                @endforeach
                    </select>
                </div>
            </div>
            {{--            Employee Name Row--}}
            <div class="row row-margin-01">
                <h2>Select Employee - <small>Employee name?</small></h2>
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>Name</b></label>
                </div>
                <div class="col-md-10">
                    <select class="form-select" name='position_id' aria-label=".form-select-sm example">
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
                    <select class="form-select" name='role_id' aria-label=".form-select-sm example">
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
                        <select class="form-select" name='position_id' aria-label=".form-select-sm example">
                            <option value='0'>{{"All Positions"}}</option>
                            @foreach($positionData as $position)
                                <option value='{{$position['id']}}'>{{$position['name']}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
            <div class="row row-margin-01 col-sm emphasis">
                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                <a href="{{url('/holiday/filter')}}"><button type="button" class="btn btn-outline-success pull-right"><i class="fa fa-filter"></i> Apply Filter</button></a>
            </div>
        </div>
    </div>

    {{--    Right Side Bar--}}
    <div class="col-md-10">
        <div class="x_panel">
            <div class="x_title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_open_shift" data-whatever="@getbootstrap">Add Holiday Request</button>
                <div class="modal fade" id="add_open_shift" tabindex="-1" role="dialog" aria-labelledby="addOpenShiftLabel" aria-hidden="true">
                    <div class="modal-dialog modal-s" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addShiftLabel">Add Holiday Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="uploadTab">
                                        <form method="POST" action="{{url('/holiday')}}" class="form-horizontal form-label-left" id="openTab">
                                            @csrf
                                            <div class="row form-group row-margin-05">
                                                <div class="col-md-3">
                                                    <label class="col-form-label text-left"><b>Employee</b></label>
                                                </div>
                                                <div class="col-md-7">
                                                    @if ((Session::get('role_id') == 1 or Session::get('role_id') == 2) and Session::has('org_id'))
                                                        <select class="form-select" name='user_id' aria-label=".form-select-sm example">
                                                            @foreach($employeeData as $employee)
                                                                <option value='{{$employee->id}}'>{{$employee->first_name}} {{$employee->last_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        @foreach($employeeData as $employee)
                                                            @if($employee->id == Session::get('user_id'))
                                                                <input type="text" class="form-control" placeholder="{{$employee->first_name}} {{$employee->last_name}}" value="{{$employee->first_name}} {{$employee->last_name}}" readonly>
                                                                <input type="hidden" name="user_id" value="{{$employee->id}}">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row form-group row-margin-05">
                                                <div class="col-md-3">
                                                    <label class="col-form-label text-left"><b>Date</b></label>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="date" name="date"  class="form-control date" value="{{old('dob')}}">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-3">
                                                    <label class="col-form-label text-left"><b>Time</b></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class='input-group date' id='myDatepicker4'>
                                                            <input type='text' class="form-control" name="no_of_hours"/>
                                                            <span class="input-group-addon">{{"Hr"}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class='input-group date' id='myDatepicker4'>
                                                            <input type='text' class="form-control" name="no_of_mins"/>
                                                            <span class="input-group-addon">{{"Min"}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group row-margin-05">
                                                <div class="col-md-3">
                                                    <label class="col-form-label text-left"><b>Holiday Code</b></label>
                                                </div>
                                                <div class="col-md-7">
                                                    <select class="form-select" name='holiday_type_id' aria-label=".form-select-sm example">
                                                        @foreach($holidayTypeData as $holiday)
                                                            <option value='{{$holiday->id}}'>{{$holiday->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group row-margin-05">
                                                <div class="col-md-3">
                                                    <label class="col-form-label text-left" name="notes"><b>Notes</b></label>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        <label for="exampleFormControlTextarea1">Add Reasons for leave, impace of work, cover staff....etc</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <input type="submit" value="Save" class="btn btn-primary ">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!(Session::get('role_id') == 6))
                    <button type="button" class="btn btn-primary">Approve Holiday</button>
                    <button type="button" class="btn btn-warning">Unapprove Holiday</button>
                    <x-button.remove/>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col"><input type="checkbox" name="ids" id="chkCheckAll"></th>
                    <th scope="col">Date</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Holiday Code</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Pay Rate</th>
                    <th scope="col">Total</th>
                    <th scope="col"><b>Actions</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($holidayData as $holiday)
                    <tr id="sid{{$holiday->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td><input type="checkbox" id="checkbox" name="ids" class="checkBox_class" value={{$holiday->id}}></td>
                        <td>{{$holiday->date}}</td>
                        <td>{{\App\Models\User::getUserName($holiday->user_id)}}</td>
                        <td>{{\App\Models\Holiday::getHolidayTypeName($holiday->holiday_type_id)}}</td>
                        <td>{{$holiday->no_of_hours}}h {{$holiday->no_of_mins}}m</td>
                        <td>£{{\App\Models\Holiday::getHolidayPayRate($holiday->holiday_type_id)}}</td>
                        <td>£{{\App\Models\Holiday::getHolidayPayRate($holiday->holiday_type_id) * ($holiday->no_of_hours + ($holiday->no_of_mins)/60)}}</td>
                        <td>
                            <div class="col-sm emphasis">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#view_shifts" data-whatever="@getbootstrap"><i class="fa fa-eye"></i></button>
                                        <div class="modal fade" id="view_shifts" tabindex="-1" role="dialog" aria-labelledby="viewShiftsLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewShiftsLabel">Add Time Off Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3" for="recipient-name">Employee</label>
                                                                <input type="text" class="form-control col-md-6 col-sm-6" id="recipient-name">
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <div class="form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3" for="message-text">Description</label>
                                                                <textarea class="form-control col-md-9 col-sm-9" id="message-text"></textarea>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label col-form-label col-md-3 col-sm-3">Type</label>
                                                                <div class="form-control col-md-6 col-sm-6">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                                                        <label class="form-check-label" for="inlineRadio1">Paid</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
                                                                        <label class="form-check-label" for="inlineRadio2">Unpaid</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                                                        <button type="button" class="btn btn-success">Save and Add New</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        @if ($holiday->approved == 1)
                                            <a href="{{ URL::to('/holiday/approve/' .$holiday->id) }}"><button type="button" class="btn btn-primary btn-sm" disabled><i class="fa fa-thumbs-o-up"></i></button></a>
                                        @else
                                            <a href="{{ URL::to('/holiday/approve/' .$holiday->id) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-o-up"></i></button></a>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        @if ($holiday->approved == 0)
                                            <a href="{{ URL::to('/holiday/unapprove/' .$holiday->id) }}"><button type="button" class="btn btn-warning btn-sm" disabled><i class="fa fa-times-circle"></i></button></a>
                                        @else
                                            <a href="{{ URL::to('/holiday/unapprove/' .$holiday->id) }}"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-times-circle"></i></button></a>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <form method="POST" action="/timeTracker/public/holiday/{{$holiday->id}}">
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


