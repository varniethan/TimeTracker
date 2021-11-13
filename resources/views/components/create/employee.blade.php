<div class="page-title">
    <div class="title_left">
        <h3>Employee Registration</h3>
    </div>
</div>
<div class="clearfix"></div>
<form method="POST" action="{{url('/employee')}}" class="form-horizontal form-label-left">
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Employees <small>Details</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                    <div class="col-sm emphasis">
                        <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                        <a href="{{url('/employee')}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                    </div>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <!-- Smart Wizard -->
            <p>Use this form to add your employees</p>
            <div id="wizard" class="form_wizard wizard_horizontal">
                <ul class="wizard_steps">
                    <li><a href="#step-1"><span class="step_no">1</span><span class="step_descr">Step 1<br /><small>Identiy Details</small></span></a></li>
                    <li><a href="#step-2"><span class="step_no">2</span><span class="step_descr">Step 2<br /><small>Contact Details</small></span></a></li>
                    <li><a href="#step-3"><span class="step_no">3</span><span class="step_descr">Step 3<br /><small>Work Details</small></span></a></li>
                    <li><a href="#step-4"><span class="step_no">4</span><span class="step_descr">Step 4<br /><small>System Details</small></span></a></li>
                </ul>
                    @csrf
                    <div id="step-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-horizontal form-label-left">
                                    <h2 class="StepTitle">Identity Details</h2>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 "><input type="text" name="first_name"  class="form-control col-9 col-md-10" placeholder="John" value="{{old('first_name')}}"></div>
                                        <span class="text-center color: red" >@error("first_name"){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 "><input type="text" name="last_name"   class="form-control col-9 col-md-10" placeholder="Smith" value="{{old('last_name')}}"></div>
                                        <span class="text-center color: red" >@error("last_name"){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6"><input class="form-control col-9 col-md-10" class='date' type="date" name="dob" required='required' value="{{old('dob')}}"></div>
                                        <span class="text-center color: red" >@error("date"){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <div id="gender" class="btn-group" data-toggle="buttons">
                                                <select name="gender" id="inputState" class="form-control">
                                                    <option name="gender" value="1">M</option>
                                                    <option name="gender" value="2">F</option>
                                                    <option name="gender" value="3">N</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h2>Select Branches</h2>
                                <p>Which branch the employee works?</p>
                                <label><strong>Branch :</strong></label><br>
                                @foreach($branchData as $branch)
{{--                                    <label><input type="checkbox" name="branch[]" value="{{$branch['id']}}">{{$branch['name']}}</label>--}}
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="name[]" value="{{$branch['id']}}" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">{{$branch['name']}}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-3">
                                <row>
                                    <h2>Select Role</h2>
                                    <p>Job title of the employee?</p>
                                    <label><strong>Role :</strong></label><br>
                                    <select class="form-select col-md-6 col-sm-6" name='role_id' aria-label=".form-select-sm example">
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
                                </row>
                                <br>
                                <br>
                                <row>
                                    <h2>Select Position</h2>
                                    <p>What does the employee do?</p>
                                    <label><strong>Position :</strong></label><br>
                                            @if(count($positionData) < 1)
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Add your employee Positions!</h4>
                                                    <p>Aww no, you have to add your employee Positions to countinue adding employees!</p>
                                                    <hr>
                                                    <p class="mb-0">Got to <code>Job Codes</code> to add all the employee Positions</p>
                                                </div>
                                            @else
                                        <select class="form-select col-md-7" name='position_id' aria-label=".form-select-sm example">
                                                @foreach($positionData as $position)
                                                    <option value='{{$position['id']}}'>{{$position['name']}}</option>
                                                @endforeach
                                        </select>
                                            @endif


                                </row>

                            </div>
                        </div>
                    </div>


                    <div id="step-2">
                        <h2 class="StepTitle">Contact Details</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile_number">Mobile Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="mobile_number" class="form-control col-9 col-md-10" placeholder="e.g. 999-999-9999"  value="{{old('mobile_number')}}"></div>
                                    <span class="text-center color: red" >@error("mobile_number"){{$message}}@enderror</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="land_number">Land Number</label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="land_number" class="form-control col-9 col-md-10" placeholder="e.g. (201) 555-0123"  value="{{old('land_number')}}"></div>
                                    <span class="text-center color: red" >@error("land_number"){{$message}}@enderror</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Email<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "> <input type="email" name="email"  class="form-control col-9 col-md-10" placeholder="example@email.com"  value="{{old('email')}}"></div>
                                    <span class="text-center color: red" >@error("email"){{$message}}@enderror</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Post Code<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="post_code"   class="form-control col-9 col-md-10" placeholder="e.g. RGH 7GH"  value="{{old('post_code')}}"></div>
                                    <span class="text-center color: red" >@error("post_code"){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 1<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="address_1" class="form-control col-9 col-md-10" placeholder="Number and street name"  value="{{old('address_1')}}"></div>
                                    <span class="text-center color: red" >@error("address_1"){{$message}}@enderror</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Address 2 <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="address_2" class="form-control col-9 col-md-10" placeholder="Appartment, suite, unit number, i.e anything not part of the physical address"  value="{{old('address_2')}}"></div>
                                    <span class="text-center color: red" >@error("address_2"){{$message}}@enderror</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_name">City<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-select col-md-6 col-sm-6" id='sel_country' name='city' aria-label=".form-select-sm example">
                                            @foreach($cityData as $city)
                                                <option value='{{ $city->id }}'>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-center color: red" >@error("city"){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="step-3">
                        <h2 class="StepTitle">Work Details</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NI Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="ni_number"  class="form-control col-9 col-md-10" placeholder="e.g. QQ 12 34 56 A"  value="{{old('ni_number')}}"><br></div>
                                    <span class="text-center color: red" >@error("ni_number"){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-3 offset-2">
                                    <h2>Select Available Shifts</h2>
                                    <p>Which Shifts the employee works?</p>
                                    <label><strong>Shifts :</strong></label><br>
                                    @foreach($shiftTypeData as $shiftType)
                                        {{--                                    <label><input type="checkbox" name="branch[]" value="{{$branch['id']}}">{{$branch['name']}}</label>--}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="category[]" value="{{$shiftType['id']}}" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">{{$shiftType['shift_name']}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <span class="text-center color: red" >@error("category"){{$message}}@enderror</span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Basic Salary<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="basic_salary"   class="form-control col-9 col-md-10" placeholder="Basic Salary"  value="{{old('basic_salary')}}"></div>
                                    <span class="text-center color: red" >@error("basic_salary"){{$message}}@enderror</span>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hourly Rate <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="hourly_rate"   class="form-control col-9 col-md-10" placeholder="Hourly Rate"  value="{{old('hourly_rate')}}"></div>
                                    <span class="text-center color: red" >@error("hourly_rate"){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="step-4">
                        <h2 class="StepTitle">System Details</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Id<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="emp_id" class="form-control col-9 col-md-10" placeholder="Employee Id"  value="{{old('emp_id')}}" readonly></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Invitation Code<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="password" class="form-control col-9 col-md-10" placeholder="{{$invitationId}}" value="{{$invitationId}}" readonly></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">User Name</label>
                                    <div class="col-md-6 col-sm-6 "><input type="text" name="user_name" class="form-control col-9 col-md-10" placeholder="User Name"  value="{{old('user_name')}}"></div>
                                    <span class="text-center color: red" >@error("user_name"){{$message}}@enderror</span>
                                </div>
                            </div>

                            <input type="hidden" id="organisation_id" name="organisation_id" value="{{session()->get('org_id')}}">
                            <input type="hidden" id="created_by" name="created_by" value="{{session()->get('user_id')}}">
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <a class="btn btn-primary" href="#" type="submit">Send Invitation Now</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

            </div>
            <!-- End SmartWizard Content -->
        </div>
    </div>
</div>
</form>
