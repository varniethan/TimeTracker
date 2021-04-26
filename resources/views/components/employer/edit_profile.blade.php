<div class="page-title"><div class="title_left"><h3>Employer Profile</h3></div></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title"><h2>User Profile <small>View Details</small></h2><ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul><div class="clearfix"></div></div>

            <div class="x_content">
                <div class ="col-sm-7 col-sm-9">
                    <form action="edit" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$employer['id']}}">
                        <p>For alternative check out the <a href="employerViewProfile.html">Veiw Profile </a>page and <code>edit</code> using the edit tab
                        </p>
                        <span class="section">Personal Info</span>
                        <div class="col-md-4">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>First Name</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="first_name" value="{{$employer['first_name']}}" required="required" type="text"/>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Last Name</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="last_name"  value="{{$employer['last_name']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Email</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="email"  value="{{$employer['email']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Phone Number</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="mobile_number"  value="{{$employer['mobile_number']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Gender</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="gender"  value="{{$employer['gender']}}" type="text" required="required" /></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Land Number</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="land_number"  value="{{$employer['land_number']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Role</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="role"  value="{{$employer['role']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>DOB</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="dob"  value="{{$employer['dob']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Office</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="branch"  value="{{$employer['branch']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Pay Rate</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="pay_rate"  value="{{$employer['pay_rate']}}" type="text" required="required" /></div>
                            </div>
                            <div>
                                <div class="ln_solid"></div>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        {{--<button type="button" class="btn btn-primary" onclick="location.href='dashboard/profile'">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>--}}
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Address_1</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="address_1"  value="{{$employer['address_1']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>Address_2</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="address_2"  value="{{$employer['address_2']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"><b>City</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="city"  value="{{$employer['city']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>State or Coutny</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="state"  value="{{$employer['state']}}" type="text" required="required" /></div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align"><b>NI Number</b><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="ni_number"  value="{{$employer['ni_number']}}" type="text" required="required" /></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class ="col-sm-3">
                    <div class="profile_img">
                        <div id="crop-avatar"><!-- Current avatar --><img class="img-responsive avatar-view" src="{{ asset('images/profile/img.jpg')}}" alt="Avatar" title="Change the avatar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


