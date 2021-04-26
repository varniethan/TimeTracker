<form action="register" method="POST" id="regForm">
    <h3>Sign-Up</h3>
    @csrf
    <div class="tab">Identity Details:
        <input type="text" name="first_name"  class="form-control" placeholder="First Name" value="{{old('first_name')}}">
        <span class="color: red" >@error("first_name"){{$message}}@enderror</span>
        <input type="text" name="last_name"   class="form-control" placeholder="Last Name" value="{{old('last_name')}}">
        <span class="color: red" >@error("last_name"){{$message}}@enderror</span>
        <div class="form-group row">
            <label class="col-form-label col-md-2 col-sm-4 label-align">D.O.B</label>
            <div class="col-md-4 col-sm-3">
                <input class="form-control" class='date' type="date" name="dob" value="{{old('dob')}}"></div>
            <span class="color: red" >@error("dob"){{$message}}@enderror</span>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-md-2 col-sm-4 label-align">Gender</label>
            <div class="form-group col-md-4">
                <select name="gender" id="inputState" class="form-control">
                    <option name="gender" value="1">M</option>
                    <option name="gender" value="2">F</option>
                    <option name="gender" value="3">N</option>
                </select>
            </div>
            <span class="color: red" >@error("gender"){{$message}}@enderror</span>
        </div>
    </div>
    <div class="tab">Contact Details:
        <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number"  value="{{old('mobile_number')}}">
        <span class="color: red" >@error("mobile_number"){{$message}}@enderror</span>
        <input type="text" name="land_number" class="form-control" placeholder="Land Number"  value="{{old('land_number')}}">
        <span class="color: red" >@error("land_number"){{$message}}@enderror</span>
        <input type="email" name="email"  class="form-control" placeholder="Email"  value="{{old('email')}}">
        <span class="color: red" >@error("email"){{$message}}@enderror</span>
        <input type="text" name="postal_code"   class="form-control" placeholder="Poste Code"  value="{{old('postal_code')}}">
        <span class="color: red" >@error("postal_code"){{$message}}@enderror</span>
        <input type="text" name="address_1" class="form-control" placeholder="Address 1"  value="{{old('address_1')}}">
        <span class="color: red" >@error("address_1"){{$message}}@enderror</span>
        <input type="text" name="address_2"   class="form-control" placeholder="Address 2"  value="{{old('address_2')}}">
        <span class="color: red" >@error("address_2"){{$message}}@enderror</span>
        <input type="text" name="city"   class="form-control" placeholder="City"  value="{{old('city')}}">
        <span class="color: red" >@error("city"){{$message}}@enderror</span>
        <input type="text" name="state"  class="form-control" placeholder="State or County"  value="{{old('state')}}">
        <span class="color: red" >@error("state"){{$message}}@enderror</span>
    </div>
    <div class="tab">Work Details:
        <input type="text" name="ni_number"  class="form-control" placeholder="NI Number"  value="{{old('ni_number')}}">
        <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
        <input type="text" name="position"   class="form-control" placeholder="Position"  value="{{old('position')}}">
        <span class="color: red" >@error("position"){{$message}}@enderror</span>
        <input type="text" name="basic_salary"   class="form-control" placeholder="Basic Salary"  value="{{old('basic_salary')}}">
        <span class="color: red" >@error("basic_salary"){{$message}}@enderror</span>
        <input type="text" name="hourly_rate"   class="form-control" placeholder="Hourly Rate"  value="{{old('hourly_rate')}}">
        <span class="color: red" >@error("hourly_rate"){{$message}}@enderror</span>
        <input type="text" name="branch"   class="form-control" placeholder="Branch"  value="{{old('branch')}}">
        <span class="color: red" >@error("branch"){{$message}}@enderror</span>
    </div>
    <div class="tab">System Details:
        <input type="text" name="username"   class="form-control" placeholder="User Name"  value="{{old('username')}}">
        <span class="color: red" >@error("username"){{$message}}@enderror</span>
        <input type="password" name="password"  class="form-control password_input" placeholder="Password"  value="{{old('password')}}">
        <span class="color: red" >@error("password"){{$message}}@enderror</span>
        <input type="password" name="password_confirmation"  class="form-control password_input" placeholder="Confirm Password"  value="{{old('password')}}">
        <span class="color: red" >@error("password_confirmation"){{$message}}@enderror</span>
        <div class="form-group row">
            <label class="col-form-label col-md-2 col-sm-4 label-align">Role</label>
            <div class="form-group col-md-4">
                <select name="role_id" id="inputState" class="form-control">
                    <option name="role_id" value="employer">Employer</option>
                    <option name="role_id" value="MD">MD</option>
                    <option name="role_id" value="branch_manager">Branch Manager</option>
                    <option name="role_id" value="shift_manager">Shift Manager</option>
                    <option name="role_id" value="employee">Employee</option>
                </select>
            </div>
            <span class="color: red" >@error("gender"){{$message}}@enderror</span>
        </div>
        <input type="checkbox" onclick="password_visible()"> Show Password <br>
    </div>
    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</form>
