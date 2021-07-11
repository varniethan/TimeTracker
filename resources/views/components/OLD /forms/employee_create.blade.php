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
        <form action="{{route('employee.store')}}" class="form-horizontal form-label-left">
            <div id="step-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-horizontal form-label-left">
                            <h2 class="StepTitle">Identity Details</h2>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 "><input type="text" name="first_name"  class="form-control col-9 col-md-10" placeholder="First Name" value="{{old('first_name')}}"></div>
                                <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 "><input type="text" name="last_name"   class="form-control col-9 col-md-10" placeholder="Last Name" value="{{old('last_name')}}"></div>
                                <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Date<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6"><input class="form-control col-9 col-md-10" class='date' type="date" name="date" required='required' value="{{old('dob')}}"></div>
                                <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
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
                    <div class="col-md-6">
                        <h2>Select Branches</h2>
                        <p>Which branch the employee works?</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">All</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">Branch 1</label>
                        </div>
                    </div>
                </div>
            </div>


            <div id="step-2">
                <h2 class="StepTitle">Contact Details</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Mobile Number<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="mobile_number" class="form-control col-9 col-md-10" placeholder="Mobile Number"  value="{{old('mobile_number')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Land Number</label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="land_number" class="form-control col-9 col-md-10" placeholder="Land Number"  value="{{old('land_number')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Email<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "> <input type="email" name="email"  class="form-control col-9 col-md-10" placeholder="Email"  value="{{old('email')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Post Code<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="postal_code"   class="form-control col-9 col-md-10" placeholder="Poste Code"  value="{{old('postal_code')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address 1<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="address_1" class="form-control col-9 col-md-10" placeholder="Address 1"  value="{{old('address_1')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Address 2 <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="address_2" class="form-control col-9 col-md-10" placeholder="Address 2"  value="{{old('address_2')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_name">City<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                            <select class="form-select col-9 col-md-10 form-select-sm" id='sel_city' name='city' aria-label=".form-select-sm example">
                                @foreach($cityData as $cities)
                                    <option value='{{ $cities->id }}'>{{ $cities->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
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
                            <div class="col-md-6 col-sm-6 "><input type="text" name="ni_number"  class="form-control col-9 col-md-10" placeholder="NI Number"  value="{{old('ni_number')}}"><br></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Position Name</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="gender" id="inputState" class="form-control col-9 col-md-10">
                                    <option name="gender" value="1">M</option>
                                    <option name="gender" value="2">F</option>
                                    <option name="gender" value="3">N</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Employee Id<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input id="birthday" class="date-picker form-control" required="required" type="text"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Basic Salary<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="basic_salary"   class="form-control col-9 col-md-10" placeholder="Basic Salary"  value="{{old('basic_salary')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hourly Rate <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="hourly_rate"   class="form-control col-9 col-md-10" placeholder="Hourly Rate"  value="{{old('hourly_rate')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_name">City<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="hourly_rate"   class="form-control col-9 col-md-10" placeholder="Hourly Rate"  value="{{old('hourly_rate')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
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
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Invitation Code<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="invitation_code" class="form-control col-9 col-md-10" placeholder="Invitation Code"  value="{{old('invitation_code')}}" readonly></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">User Name</label>
                            <div class="col-md-6 col-sm-6 "><input type="text" name="user_name" class="form-control col-9 col-md-10" placeholder="User Name"  value="{{old('user_name')}}"></div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <a class="btn btn-primary" href="#" type="submit">Send Invitation Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End SmartWizard Content -->
</div>

