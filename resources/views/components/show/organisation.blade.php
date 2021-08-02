<!-- page content -->
<div class="page-title">
    <div class="title_left">
        <h3>Organisation Profile <small> details</small></h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Branch Analysis</h2>
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

                <div class="col-md-9 col-sm-9  ">

                    <ul class="stats-overview">
                        <li>
                            <span class="name"> Total hours today </span>
                            <span class="value text-success"> 2300 </span>
                        </li>
                        <li>
                            <span class="name"> No of staffs available now </span>
                            <span class="value text-success"> 2000 </span>
                        </li>
                        <li class="hidden-phone">
                            <span class="name"> Estimated todays cost </span>
                            <span class="value text-success"> 20 </span>
                        </li>
                    </ul>
                    <br />

                    {{--                    <div id="mainb" style="height:350px;"></div>--}}
                    <div id="graph_area" style="width:100%; height:300px;"></div>

                    <div>
                        <h5>Branch Details</h5>
                        <div class="x_panel">
                            @foreach($branchData as $branch)
                                <div class="col-md-4 col-sm-4  profile_details">
                                    <div class="well profile_view">
                                        <div class="col-sm-12">
                                            <h4 class="brief"><i>{{$branch->name}}</i></h4>
                                            <div class="left col-sm-7">
                                                <h2>{{$branch['display_name']}}</h2>
                                                <p><strong>About: </strong> Web Designer / UI. </p>
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-road"></i> Postal Code: <b>{{$branch['postal_code']}}</b></li>
                                                    <li><i class="fa fa-street-view"></i> Address 1: <b>{{$branch['address_1']}}, {{$branch['address_2']}}</b></li>
                                                    <li><i class="fa fa-mobile-phone"></i> Mobile Phone: <b>{{$branch['mobile_number']}}</b></li>
                                                    <li><i class="fa fa-phone"></i> Land Phone: <b>{{$branch['land_number']}}</b></li>
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
                                                <a href="{{ URL::to('branch/' .$branch['id']) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                                                <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                                                <a href="{{ URL::to('branch/' . $branch['id'] . '/edit') }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i></button></a>
                                                <x-button.remove/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>

                <!-- start project-detail sidebar -->
                <div class="col-md-3 col-sm-3  ">

                    <section class="panel">

                        <div class="x_title">
                            <h2>Branch Description</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <h3 class="green"><i class="fa fa-building"></i> {{$organisationData['display_name']}}</h3>
                            <p>Here are the details we have.....</p>
                            <form class="form-label-left input_mask">
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Name</b>
                                    </div>
                                    <div class="col-md-9 col-sm-9 form-group has-feedback">
                                        <input type="text" class="form-control" id="inputSuccess3" readonly="readonly" placeholder="{{$organisationData['name']}}">
                                        <span class="fa fa-building form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Display Name</b>
                                    </div>

                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$organisationData['display_name']}}">
                                    <span class="fa fa-building form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Mobile Number</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$organisationData['mobile_number']}}">
                                    <span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Land Number</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$organisationData['land_number']}}">
                                    <span class="fa fa-phone-square form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Address 1</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$organisationData['address_1']}}">
                                    <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Address 2</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$organisationData['address_2']}}">
                                    <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>

                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>Postal Code</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{$organisationData['postal_code']}}">
                                    <span class="fa fa-road form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div>
                                    <div class="col-md-3 col-sm-3">
                                        <b>City</b>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 form-group has-feedback">
                                    <input type="tel" class="form-control" id="inputSuccess5" readonly="readonly" placeholder="{{\App\Models\City::getCityName($organisationData['city'])}}">
                                    <span class="fa fa-map form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </form>
                            <br />
                        </div>
                    </section>

                </div>
                <!-- end project-detail sidebar -->

            </div>
        </div>
    </div>
</div>
<!-- /page content -->
