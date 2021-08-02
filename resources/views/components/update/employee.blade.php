<div class="page-title"><div class="title_left">
        <h3>
            @if($employeeData['role_id'] == 4)
                Branch Manager Profile
            @elseif($employeeData['role_id'] == 5)
                Shift Manager Profile
            @elseif($employeeData['role_id'] == 6)
                Empoyee Profile
            @endif
        </h3>
    </div></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title"><h2>User Profile <small>Edit Details</small></h2><ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul><div class="clearfix"></div></div>
            <div class="x_content">
                <div class="row">
                    <span class="section">{{$employeeData['first_name']}} {{$employeeData['last_name']}}</span>
                    <div class="col-sm">
                        <form method="POST" action="/timeTracker/public/employee/{{ $employeeData['id'] }}">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="email" name="email"  class="form-control" placeholder="Email"  value="{{$employeeData['email']}}" disabled>
                                </div>
                            </div>
                            <span class="color: red" >@error("email"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">User Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control"  name="user_name" placeholder="User Name" value="{{$employeeData['user_name']}}" required="required" disabled/>
                                </div>
                            </div>
                            <span class="color: red" >@error("user_name"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">First Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="first_name" placeholder="First Name" value="{{$employeeData['first_name']}}" required="required" />
                                </div>
                            </div>
                            <span class="color: red" >@error("first_name"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Last Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="last_name" placeholder="First Name" value="{{$employeeData['last_name']}}" required="required" />
                                </div>
                            </div>
                            <span class="color: red" >@error("last_name"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile Number<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number"  value="{{$employeeData['mobile_number']}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("mobile_number"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Land Number<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="land_number" class="form-control" placeholder="Mobile Number"  value="{{$employeeData['land_number']}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("land_number"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Postal Code<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="post_code" class="form-control" placeholder="Postal Code"  value="{{$employeeData['post_code']}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("post_code"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Address 1<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="address_1"   class="form-control" placeholder="Address 1"  value="{{$employeeData['address_1']}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("address_1"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Address 2<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="address_2" class="form-control" placeholder="Address 2" value="{{$employeeData['address_2']}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("address_2"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Country<span class="required">*</span></label>
                                <select class="form-select col-md-6 col-sm-6" id='sel_country' name='country' aria-label=".form-select-sm example">
                                    @foreach($countryData as $country)
                                        <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">City<span class="required">*</span></label>
                                <select class="form-select col-md-6 col-sm-6" id='sel_city' name='city' aria-label=".form-select-sm example">
                                    <option value='{{$employeeData['city']}}'>{{\App\Models\City::getCityName($employeeData['city'])}}</option>
                                    <option value='0'>-- Select City --</option>
                                </select>
                            </div>
                            <span class="color: red" >@error("city"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">NI Number<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="ni_number" class="form-control" placeholder="NI Number"  value="{{$employeeData['ni_number']}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("ni_number"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Basic Salary<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="basic_salary" class="form-control" placeholder="Basic Salary"  value="{{$employeeData['basic_salary']}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("basic_salary"){{$message}}@enderror</span>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary">Submit</button>
                                        <button type='reset' class="btn btn-success">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm">
                        <div class="profile_img">
                            <div id="crop-avatar"><!-- Current avatar --><img class="img-responsive avatar-view" src="{{ asset('images/profile/img.jpg')}}" alt="Avatar" title="Change the avatar"></div>
                        </div>
                        {{--                        <h3>{{$employer['first_name']}} {{$employer['last_name']}}</h3>--}}
                        <ul class="list-unstyled user_data">
                            {{--                            <li><i class="fa fa-map-marker user-profile-icon"></i> {{$employer['city']}}, {{$employer['state']}}, {{$employer['country']}} </li>--}}
                            <li><i class="fa fa-briefcase user-profile-icon"></i> Software Engineer</li>
                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i>
                                <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                            </li>
                        </ul>
                        <a class="btn btn-primary" href="{{url('/profile')}}"><i class="fa fa-eye m-right-xs"></i>View Profile</a><br>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


