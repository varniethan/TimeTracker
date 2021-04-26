<div class="page-title"><div class="title_left"><h3>Employer Profile</h3></div></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title"><h2>User Profile <small>View Details</small></h2><ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul><div class="clearfix"></div></div>

            <div class="x_content">
                <div class="col-md-3 col-sm-3  profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar"><!-- Current avatar --><img class="img-responsive avatar-view" src="{{ asset('images/profile/img.jpg')}}" alt="Avatar" title="Change the avatar"></div>
                    </div>
                    <h3>{{$employer['first_name']}} {{$employer['last_name']}}</h3>
                    <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{$employer['city']}}, {{$employer['state']}}, {{$employer['country']}} </li>
                        <li><i class="fa fa-briefcase user-profile-icon"></i> Software Engineer</li>
                        <li class="m-top-xs">
                            <i class="fa fa-external-link user-profile-icon"></i>
                            <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li>
                    </ul>
                    <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a><br>
                </div>

                <div class="col-md-9 col-sm-9 "><div class="profile_title"><div class="col-md-6"><h2>Here are the details we have.....</h2></div></div>
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Identity Details</a></li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Contact Details</a></li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Work Details</a></li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">System Details</a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="x_content"><br>
                                    <form class="form-label-left input_mask">
                                        <div>
                                            <div class="col-md-6 col-sm-6">
                                                <b>First Name</b>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <b>Last Name</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="inputSuccess2" readonly="readonly" placeholder="{{$employer['first_name']}}">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="text" class="form-control" id="inputSuccess3" readonly="readonly" placeholder="{{$employer['last_name']}}">
                                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                        <div>
                                            <div class="col-md-6 col-sm-6">
                                                <b>Email</b>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <b>Phone</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="email" class="form-control has-feedback-left" id="inputSuccess4" readonly="readonly" placeholder="{{$employer['email']}}">
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$employer['mobile_number']}}">
                                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                        </div>

                                        <div>
                                            <div class="col-md-6 col-sm-6">
                                                <b>D.O.B</b>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <b>Gender</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="email" class="form-control has-feedback-left" id="inputSuccess4" readonly="readonly" placeholder="{{$employer['dob']}}">
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$employer['gender']}}">
                                            <span class="fa fa-check-circle-o form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                    </form>

                                    <div class="ln_solid"></div>
                                    {{--<div class="form-group row">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <button type="button" class="btn btn-primary">Cancel</button>
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab2">
                            <form class="form-label-left input_mask">
                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Mobile Number</b>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Land Number</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" readonly="readonly" placeholder="{{$employer['mobile_number']}}">
                                    <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" class="form-control" id="inputSuccess3" readonly="readonly" placeholder="{{$employer['land_number']}}">
                                    <span class="fa fa-phone-square form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Email</b>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Post Code</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="email" class="form-control has-feedback-left" id="inputSuccess4" readonly="readonly" placeholder="{{$employer['email']}}">
                                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$employer['postal_code']}}">
                                    <span class="fa fa-road form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Address 1</b>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Address 2</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="email" class="form-control has-feedback-left" id="inputSuccess4" readonly="readonly" placeholder="{{$employer['address_1']}}">
                                    <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$employer['address_2']}}">
                                    <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>City</b>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>State or County</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="email" class="form-control has-feedback-left" id="inputSuccess4" readonly="readonly" placeholder="{{$employer['city']}}">
                                    <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$employer['state']}}">
                                    <span class="fa fa-building form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </form>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab3">
                            <form class="form-label-left input_mask">
                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>NI Number</b>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Position</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" readonly="readonly" placeholder="{{$employer['ni_number']}}">
                                    <span class="fa fa-tags form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" class="form-control" id="inputSuccess3" readonly="readonly" placeholder="{{$employer['position']}}">
                                    <span class="fa fa-phone-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Basic Salary</b>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Hourly Rate</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="email" class="form-control has-feedback-left" id="inputSuccess4" readonly="readonly" placeholder="{{$employer['basic_salary']}}">
                                    <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$employer['hourly_rate']}}">
                                    <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Branch</b>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Address 2</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="email" class="form-control has-feedback-left" id="inputSuccess4" readonly="readonly" placeholder="{{$employer['branch']}}">
                                    <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$employer['address_2']}}">
                                    <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </form>
                        </div>


                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab4">
                            <form class="form-label-left input_mask">
                                <div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>User Name</b>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <b>Password</b>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" readonly="readonly" placeholder="{{$employer['user_name']}}">
                                    <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <input type="password" class="form-control" id="inputSuccess3" readonly="readonly" value=".................">
                                    <span class="fa fa-phone-square form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
