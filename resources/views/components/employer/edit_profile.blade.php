<div class="page-title"><div class="title_left"><h3>Employer Profile</h3></div></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title"><h2>User Profile <small>View Details</small></h2><ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul><div class="clearfix"></div></div>
            <div class="x_content">
                <div class="row">
                    <span class="section">Organisation Info</span>
                    <div class="col-sm">
                        <form class="" action="company_add" method="post">
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="email" name="email"  class="form-control" placeholder="Email"  value="{{old('email')}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("email"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Organisation Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Alphabet Inc." required="required" />
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Display Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" name="display_name" placeholder="Google LLC" required="required" />
                                </div>
                            </div>
                            <input type="hidden" name="owner"   class="form-control" placeholder="owner"  value={{Session::get('user_id')}}><br>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Mobile Number<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number"  value="{{old('mobile_number')}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("mobile_number"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Land Number<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="land_number" class="form-control" placeholder="Land Number"  value="{{old('land_number')}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("land_number"){{$message}}@enderror</span>

                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Postal Code<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="postal_code"   class="form-control" placeholder="Poste Code"  value="{{old('postal_code')}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("postal_code"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Address 1<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="address_1" class="form-control" placeholder="Address 1"  value="{{old('address_1')}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("address_1"){{$message}}@enderror</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Address 2<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="address_2" class="form-control" placeholder="Address 2"  value="{{old('address_2')}}">
                                </div>
                            </div>
                            <span class="color: red" >@error("address_2"){{$message}}@enderror</span>
                            {{--<div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Country<span class="required">*</span></label>
                                <select class="form-select col-md-6 col-sm-6" id='sel_country' name='country' aria-label=".form-select-sm example">
                                    @foreach($countryData['data'] as $country)
                                        <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>--}}
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">City<span class="required">*</span></label>
                                <select class="form-select col-md-6 col-sm-6" id='sel_city' name='city' aria-label=".form-select-sm example">
                                    <option value='0'>-- Select City --</option>
                                </select>
                            </div>
                            <span class="color: red" >@error("city"){{$message}}@enderror</span>
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
                        <h3>{{$employer['first_name']}} {{$employer['last_name']}}</h3>
                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-map-marker user-profile-icon"></i> {{$employer['city']}}, {{$employer['state']}}, {{$employer['country']}} </li>
                            <li><i class="fa fa-briefcase user-profile-icon"></i> Software Engineer</li>
                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i>
                                <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                            </li>
                        </ul>
                        <a class="btn btn-primary"><i class="fa fa-eye m-right-xs"></i>View Profile</a><br>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


