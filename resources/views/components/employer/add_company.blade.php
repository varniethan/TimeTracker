<div class="page-title"><div class="title_left"><h3>Organisation</h3></div></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add <small>your Organisation details</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="" action="company_add" method="post" >
                    @csrf
                    <span class="section">Organisation Info</span>
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
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="email" name="email"  class="form-control" placeholder="Email"  value="{{old('email')}}">
                        </div>
                    </div>
                    <span class="color: red" >@error("email"){{$message}}@enderror</span>
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
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Country<span class="required">*</span></label>
                        <select class="form-select col-md-6 col-sm-6" id='sel_country' name='country' aria-label=".form-select-sm example">
                            @foreach($countryData['data'] as $country)
                                <option value='{{ $country->id }}'>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
        </div>
    </div>
</div>
