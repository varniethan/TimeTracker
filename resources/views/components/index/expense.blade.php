<div class="page-title"><div class="title_left"><h3>Expense Sheet</h3></div></div>
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
                        <h4>Filter <small>your expense sheet</small></h4>
                    </div>
                    <div class="col-md-2 form-group">
                        <div class="col-sm emphasis">
                            <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                            <a href="{{url('/employee/expense/filter')}}"><button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-refresh"></i></button></a>
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
                        {{--                        @foreach($branchData as $branch)--}}
                        {{--                            <option value='{{$branch['id']}}'>{{$branch['name']}}</option>--}}
                        {{--                        @endforeach--}}
                    </select>
                </div>
            </div>
            {{--            Holiday Type Row--}}
            <div class="row row-margin-01">
                <h2>Select Expense Code - <small>Type of Expense?</small></h2>
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>Code</b></label>
                </div>
                <div class="col-md-10">
                    <select class="form-select" name='position_id' aria-label=".form-select-sm example">
                        <option value='0'>{{"All Expense Code"}}</option>
                        {{--                        @foreach($branchData as $branch)--}}
                        {{--                            <option value='{{$branch['id']}}'>{{$branch['name']}}</option>--}}
                        {{--                        @endforeach--}}
                    </select>
                </div>
            </div>
            {{--            Branch Row--}}
            <div class="row row-margin-01">
                <h2>Select Branch - <small>location worked?</small></h2>
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>Branch</b></label>
                </div>
                <div class="col-md-10">
                    <select class="form-select" name='position_id' aria-label=".form-select-sm example">
                        <option value='0'>{{"All Branches"}}</option>
                        {{--                        @foreach($branchData as $branch)--}}
                        {{--                            <option value='{{$branch['id']}}'>{{$branch['name']}}</option>--}}
                        {{--                        @endforeach--}}
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
                        <option value='0'>{{"All Employee"}}</option>
                        {{--                        @foreach($branchData as $branch)--}}
                        {{--                            <option value='{{$branch['id']}}'>{{$branch['name']}}</option>--}}
                        {{--                        @endforeach--}}
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
                        <option value='0'>{{"All Job Title"}}</option>
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
                    {{--                    @if(count($positionData) < 1)--}}
                    {{--                        <div class="alert alert-danger" role="alert">--}}
                    {{--                            <h4 class="alert-heading">Add your employee Positions!</h4>--}}
                    {{--                            <p>Aww no, you have to add your employee Positions to countinue adding employees!</p>--}}
                    {{--                            <hr>--}}
                    {{--                            <p class="mb-0">Got to <code>Job Codes</code> to add all the employee Positions</p>--}}
                    {{--                        </div>--}}
                    {{--                    @else--}}
                    {{--                        <select class="form-select" name='position_id' aria-label=".form-select-sm example">--}}
                    {{--                            @foreach($positionData as $position)--}}
                    {{--                                <option value='{{$position['id']}}'>{{$position['name']}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    @endif--}}
                </div>
            </div>
            <div class="row row-margin-01 col-sm emphasis">
                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                <a href="{{url('/employee/expense/filter')}}"><button type="button" class="btn btn-outline-success pull-right"><i class="fa fa-filter"></i> Apply Filter</button></a>
            </div>
        </div>
    </div>

    {{--    Right Side Bar--}}
    <div class="col-md-10">
        <div class="x_panel">
            <div class="x_title">
                @if (!(Session::get('role_id') == 6))
                    <button type="button" class="btn btn-primary">Approve Expense</button>
                    <button type="button" class="btn btn-warning">Unapprove Expense</button>
                    <x-button.remove/>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Select</th>
                    <th scope="col">Date</th>
                    <th scope="col">Employee</th>
                    <th scope="col">Location</th>
                    <th scope="col">Expense</th>
                    <th scope="col">Units</th>
                    <th scope="col">Amount</th>
                    <th scope="col"><b>Actions</b></th>
                </tr>
                </thead>
                <tbody>
                {{--                @foreach($fullShiftData as $fullShift)--}}
                {{--                    <tr>--}}
                {{--                        <th scope="row"><input type="checkbox" id="selected" name="selected" value="selected"></th>--}}
                {{--                        <td>{{$loop->iteration}}</td>--}}
                {{--                        <td>{{$fullShift['date']}}</td>--}}
                {{--                        <td>{{$fullShift['shift_type_id']}}</td>--}}
                {{--                        <td>{{$fullShift['user_id']}}</td>--}}
                {{--                        <td>{{$fullShift['branch_shift_id']}}</td>--}}
                {{--                        <td>{{$fullShift['clock_in']}}</td>--}}
                {{--                        <td>{{$fullShift['clock_out']}}</td>--}}
                {{--                        <td>{{"Duration"}}</td>--}}
                {{--                        <td>{{"Duration"}}</td>--}}
                {{--                        <td>{{"Duration"}}</td>--}}
                {{--                        <td>{{"Duration"}}</td>--}}
                {{--                        <td>--}}
                {{--                            <div class="col-sm emphasis">--}}
                {{--                                <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#view_shifts" data-whatever="@getbootstrap"><i class="fa fa-eye"></i></button>--}}
                {{--                                <div class="modal fade" id="view_shifts" tabindex="-1" role="dialog" aria-labelledby="viewShiftsLabel" aria-hidden="true">--}}
                {{--                                    <div class="modal-dialog" role="document">--}}
                {{--                                        <div class="modal-content">--}}
                {{--                                            <div class="modal-header">--}}
                {{--                                                <h5 class="modal-title" id="viewShiftsLabel">Add Time Off Category</h5>--}}
                {{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--                                                    <span aria-hidden="true">&times;</span>--}}
                {{--                                                </button>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="modal-body">--}}
                {{--                                                <form>--}}
                {{--                                                    <div class="form-group">--}}
                {{--                                                        <label class="col-form-label col-md-3 col-sm-3" for="recipient-name">Employee</label>--}}
                {{--                                                        <input type="text" class="form-control col-md-6 col-sm-6" id="recipient-name">--}}
                {{--                                                    </div>--}}
                {{--                                                    <br>--}}
                {{--                                                    <br>--}}
                {{--                                                    <br>--}}
                {{--                                                    <div class="form-group">--}}
                {{--                                                        <label class="col-form-label col-md-3 col-sm-3" for="message-text">Description</label>--}}
                {{--                                                        <textarea class="form-control col-md-9 col-sm-9" id="message-text"></textarea>--}}
                {{--                                                    </div>--}}
                {{--                                                    <br>--}}
                {{--                                                    <br>--}}
                {{--                                                    <br>--}}
                {{--                                                    <div class="form-group">--}}
                {{--                                                        <label for="message-text" class="col-form-label col-form-label col-md-3 col-sm-3">Type</label>--}}
                {{--                                                        <div class="form-control col-md-6 col-sm-6">--}}
                {{--                                                            <div class="form-check form-check-inline">--}}
                {{--                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">--}}
                {{--                                                                <label class="form-check-label" for="inlineRadio1">Paid</label>--}}
                {{--                                                            </div>--}}
                {{--                                                            <div class="form-check form-check-inline">--}}
                {{--                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">--}}
                {{--                                                                <label class="form-check-label" for="inlineRadio2">Unpaid</label>--}}
                {{--                                                            </div>--}}
                {{--                                                        </div>--}}
                {{--                                                    </div>--}}
                {{--                                                </form>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="modal-footer">--}}
                {{--                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>--}}
                {{--                                                <button type="button" class="btn btn-success">Save and Add New</button>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <a href="{{url('/employee/create')}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-o-up"></i></button></a>--}}
                {{--                                <a href="{{url('/employee/create')}}"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-times-circle"></i></button></a>--}}
                {{--                                <x-button.remove/>--}}
                {{--                            </div>--}}
                {{--                        </td>--}}
                {{--                    </tr>--}}
                {{--                @endforeach--}}
                </tbody>
            </table>
        </div>
    </div>
</div>


