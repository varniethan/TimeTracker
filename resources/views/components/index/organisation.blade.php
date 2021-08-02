<div class="page-title"><div class="title_left"><h3>Organisation Profile</h3></div></div>
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
                                        <h4 class="brief"><i>{{$organisationData['name']}}</i></h4>
                                        <div class="left col-sm-7">
                                            <h2>{{$organisationData['display_name']}}</h2>
                                            {{--<p><strong>About: </strong> Web Designer / UX / Graphic Artist / Coffee Lover </p>--}}
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-road"></i> <strong>Postal Code:</strong> {{$organisationData['postal_code']}}</li>
                                                <li><i class="fa fa-street-view"></i> <strong>Address 1:</strong> {{$organisationData['address_1']}}, {{$organisationData['address_2']}}</li>
                                                <li><i class="fa fa-envelope"></i> <strong>Email:</strong> {{$organisationData['email']}}</li>
                                                <li><i class="fa fa-mobile-phone"></i> <strong>Mobile Phone:</strong> {{$organisationData['mobile_number']}}</li>
                                                <li><i class="fa fa-phone"></i> <strong>Land Phone:</strong> {{$organisationData['land_number']}}</li>
                                            </ul>
                                        </div>
                                        <div class="right col-sm-5 text-center">
                                            <img src="{{ asset('images/profileOrganisation/shell.jpg')}}" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                    <div class=" profile-bottom text-center">
                                        <div class=" col-sm-6 emphasis">

                                        </div>

                                    </div>
                                    <div class=" col-sm-6 emphasis">
                                        <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                        <a href="{{ URL::to('organisation/' .$organisationData['id']) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                                        @if(Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3)
                                            <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                                                <a href="{{ URL::to('organisation/' .$organisationData['id'] .'/edit') }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i></button></a>
                                            <x-button.remove/>
                                        @endif
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
