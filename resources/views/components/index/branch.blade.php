<div class="page-title"><div class="title_left"><h3>Branch Profile</h3></div></div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title"><h2>Your Branches<small>View Details</small></h2><ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul><div class="clearfix"></div></div>
            <div class="x_content">
                <div class="row">
                    <div class="x_content">
                        @foreach($branchData as $branch)
                            <div class="col-md-4 col-sm-4  profile_details">
                                <div class="well profile_view">
                                    <div class="col-sm-12">
                                        <h4 class="brief"><i> {{$branch->name}}</i></h4>
                                        <div class="left col-sm-7">
                                            <h2><b>{{$branch->display_name}}</b></h2>
                                            <p><strong>About: </strong> Web Designer / UI. </p>
                                            <ul class="list-unstyled">
                                                <li><i class="fa fa-road"></i><b> Postal Code:</b> {{$branch->postal_code}}</li>
                                                <li><i class="fa fa-street-view"></i><b> Address 1:</b> {{$branch->address_1}}</li>
                                                <li><i class="fa fa-street-view"></i><b> Address 2:</b> {{$branch->address_2}}</li>
                                                <li><i class="fa fa-map"></i><b> City:</b> {{\App\Models\City::getCityName($branch->city)}}</li>
                                                <li><i class="fa fa-envelope"></i> <strong>Email: </strong>{{$branch->email}}</li>
                                                <li><i class="fa fa-mobile-phone"></i><b> Mobile Phone:</b> {{$branch->mobile_number}}</li>
                                                <li><i class="fa fa-phone"></i><b> Land Phone:</b> {{$branch->land_number}}</li>
                                            </ul>
                                        </div>
                                        <div class="right col-sm-5 text-center">
                                            <img src="{{ asset('images/profileOrganisation/shell.jpg')}}" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                    <div class=" bottom text-center">
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
                                            <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                                            <a href="{{ URL::to('branch/' .$branch->id) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                                            @if(Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3)
                                                <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                                                    <a href="{{ URL::to('branch/' . $branch->id . '/edit') }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i></button></a>
                                            <x-button.remove/>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3)
    <div class="x_title">
        <div class="d-flex justify-content-center">
            {{ $branchData->links() }}
        </div>
    </div>
@endif

