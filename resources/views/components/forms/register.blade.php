<form action="register" method="POST" id="regForm">
    <h3>Sign-Up</h3>
    @csrf
    <div class="tab">
        <p class="text-center boldContent">Identity Details:</p>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">First Name</label>
            </div>
            <div class="col-10">
                <input type="text" name="first_name"  class="form-control col-9 col-md-10" placeholder="First Name" value="{{old('first_name')}}">
            </div>
        </div>
        <span class="color: red" >@error("first_name"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Last Name</label>
            </div>
            <div class="col-10">
                <input type="text" name="last_name"   class="form-control col-9 col-md-10" placeholder="Last Name" value="{{old('last_name')}}">
            </div>
        </div>
        <span class="color: red" >@error("last_name"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">D.O.B</label>
            </div>
            <div class="col-5">
                <input type="date" name="dob"   class="form-control col-9 col-md-10 date" value="{{old('dob')}}">
            </div>
        </div>
        <span class="color: red" >@error("last_name"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-md-2 col-sm-4 label-align">Gender</label>
            </div>
            <div class="col-2">
                <select name="gender" id="inputState" class="form-control">
                    <option name="gender" value="1">M</option>
                    <option name="gender" value="2">F</option>
                    <option name="gender" value="3">N</option>
                </select>
            </div>
        </div>
        <span class="color: red" >@error("gender"){{$message}}@enderror</span>
    </div>

    <div class="tab">
        <p class="text-center boldContent">Contact Details:</p>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Mobile Number</label>
            </div>
            <div class="col-10">
                <input type="text" name="mobile_number" class="form-control col-9 col-md-10" placeholder="Mobile Number"  value="{{old('mobile_number')}}">
            </div>
        </div>
        <span class="color: red" >@error("mobile_number"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Land Number</label>
            </div>
            <div class="col-10">
                <input type="text" name="land_number" class="form-control col-9 col-md-10" placeholder="Land Number"  value="{{old('land_number')}}">
            </div>
        </div>
        <span class="color: red" >@error("land_number"){{$message}}@enderror</span>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Email</label>
            </div>
            <div class="col-10">
                <input type="email" name="email"  class="form-control col-9 col-md-10" placeholder="Email"  value="{{old('email')}}">
            </div>
        </div>
        <span class="color: red" >@error("email"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Postal Code</label>
            </div>
            <div class="col-10">
                <input type="text" name="postal_code"   class="form-control col-9 col-md-10" placeholder="Poste Code"  value="{{old('postal_code')}}">
            </div>
        </div>
        <span class="color: red" >@error("postal_code"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Address-1</label>
            </div>
            <div class="col-10">
                <input type="text" name="address_1" class="form-control col-9 col-md-10" placeholder="Address 1"  value="{{old('address_1')}}">
            </div>
        </div>
        <span class="color: red" >@error("address_1"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Address-2</label>
            </div>
            <div class="col-10">
                <input type="text" name="address_2" class="form-control col-9 col-md-10" placeholder="Address 2"  value="{{old('address_2')}}">
            </div>
        </div>
        <span class="color: red" >@error("address_1"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Country</label>
            </div>
            <div class="col-10">
                <select class="form-select col-9 col-md-10 form-select-sm" id='sel_country' name='country' aria-label=".form-select-sm example">
                    @foreach($countryData['data'] as $country)
                        <option value='{{ $country->id }}'>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">City</label>
            </div>
            <div class="col-10">
                <select class="form-select col-9 col-md-10 form-select-sm" id='sel_city' name='city' aria-label=".form-select-sm example">
                    <option value='0'>-- Select City --</option>
                </select>
            </div>
        </div>
        <span class="color: red" >@error("city"){{$message}}@enderror</span>
    </div>

    <div class="tab">
        <p class="text-center boldContent">Work Details:</p>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 label-align">NI</label>
            </div>
            <div class="col-10">
                <input type="text" name="ni_number"  class="form-control col-9 col-md-10" placeholder="NI Number"  value="{{old('ni_number')}}"><br>
                <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
            </div>
        </div>
        <input type="hidden" name="position"   class="form-control" placeholder="Position"  value="1"><br>
        <span class="color: red" >@error("position"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 label-align">Basic Salary</label>
            </div>
            <div class="col-10">
                <input type="text" name="basic_salary"   class="form-control col-9 col-md-10" placeholder="Basic Salary"  value="{{old('basic_salary')}}"><br>
                <span class="color: red" >@error("basic_salary"){{$message}}@enderror</span>
            </div>
        </div>
    </div>

    <div class="tab">
        <p class="text-center boldContent">System Details:</p>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">User Name</label>
            </div>
            <div class="col-10">
                <input type="text" name="user_name"   class="form-control col-9 col-md-10" placeholder="User Name"  value="{{old('username')}}">
            </div>
        </div>
        <span class="color: red" >@error("username"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Password</label>
            </div>
            <div class="col-10">
                <input type="password" name="password"  class="form-control col-9 col-md-10 password_input" placeholder="Password"  value="{{old('password')}}">
            </div>
        </div>
        <span class="color: red" >@error("password"){{$message}}@enderror</span>
        <div class="form-group row">
            <div class="col-2">
                <label class="col-form-label col-3 col-md-2 text-left">Confirm Password</label>
            </div>
            <div class="col-10">
                <input type="password" name="password_confirmation"  class="form-control col-9 col-md-10 password_input" placeholder="Confirm Password"  value="{{old('password')}}"><br>
            </div>
        </div>
        <span class="color: red" >@error("password_confirmation"){{$message}}@enderror</span>
        <input type="hidden" name="role"   class="form-control" placeholder="Role"  value="1"><br>
        <span class="color: red" >@error("role"){{$message}}@enderror</span>

    </div>

    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" class="btn btn-lg btn-success font-size-16 mt-xlg-4 mt-md-3 mb-2" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" class="btn btn-lg btn-success font-size-16 mt-xlg-4 mt-md-3 mb-2" onclick="nextPrev(1)">Next</button>
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
