<div class="page-title"><div class="title_left"><h3>Companies</h3></div></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title"><h2>Your Companies<small>View Details</small></h2><ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul><div class="clearfix"></div></div>
            <div class="x_content">
                <div class="row">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="clearfix"></div>
                            <div class="col-md-4 col-sm-4  profile_details">
                                <div class="well profile_view">
                                    <div class="col-sm-12">
                                        <h4 class="brief"><i>{{$organisation['name']}}</i></h4>
                                        <div class="left col-sm-7">
                                            <h2>{{$organisation['display_name']}}</h2>
                                            {{--<p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>--}}
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-road"></i> Postal Code: <b>{{$organisation['postal_code']}}</b></li>
                                                <li><i class="fa fa-street-view"></i> Address 1: <b>{{$organisation['address_1']}}, {{$organisation['address_2']}}</b></li>
                                                <li><i class="fa fa-mobile-phone"></i> Mobile Phone: <b>{{$organisation['mobile_number']}}</b></li>
                                                <li><i class="fa fa-phone"></i> Land Phone: <b>{{$organisation['land_number']}}</b></li>
                                            </ul>
                                        </div>
                                        <div class="right col-sm-5 text-center">
                                            <img src="{{ asset('images/profileOrganisation/shell.jpg')}}" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                    <div class=" profile-bottom text-center">
                                        <div class=" col-sm-6 emphasis">
                                            <p class="ratings">
                                                <a>4.0</a>
                                                <a href="#"><span class="fa fa-star"></span></a>
                                                <a href="#"><span class="fa fa-star"></span></a>
                                                <a href="#"><span class="fa fa-star"></span></a>
                                                <a href="#"><span class="fa fa-star"></span></a>
                                                <a href="#"><span class="fa fa-star-o"></span></a>
                                            </p>
                                        </div>
                                        <div class=" col-sm-6 emphasis">
                                            <x-buttons.edit/>
                                            <x-buttons.remove/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
