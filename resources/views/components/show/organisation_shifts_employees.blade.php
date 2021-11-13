<div class="page-title">
    <div class="title_left">
        <h3>Available Employees for {{$shiftData}}</h3>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <!-- top tiles -->
        <div class="row">
            <div class="col-sm">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitches1" checked="">
                    <label class="custom-control-label" for="customSwitches1">Switch to row view</label>
                </div>
            </div>
            <div class="col-sm">
                <h5>Branch:</h5>
                <div class="input-group">
                    <select class="mdb-select md-form" searchable="Search here..">
                        <option value="" disabled selected>Choose your Branch</option>
                        <option value="1">USA</option>
                        <option value="2">Germany</option>
                        <option value="3">France</option>
                        <option value="3">Poland</option>
                        <option value="3">Japan</option>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <h5>Position:</h5>
                <div class="input-group">
                    <select class="mdb-select md-form" searchable="Search here..">
                        <option value="" disabled selected>Choose your Position</option>
                        <option value="1">USA</option>
                        <option value="2">Germany</option>
                        <option value="3">France</option>
                        <option value="3">Poland</option>
                        <option value="3">Japan</option>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <div class="top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn"><button class="btn btn-default" type="button">Go!</button></span>
                    </div>
                </div>
            </div>
            {{--            <div class="col-sm">--}}
            {{--                <a class="btn btn-primary" href="addEmployees.html" role="button">Add Employees</a>--}}
            {{--            </div>--}}
            <div class="col-sm emphasis">
                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                <a href="{{url('/employee/create')}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button></a>
                <x-button.remove/>
            </div>
        </div>
        <!-- /top tiles -->
        <ul class="nav navbar-right panel_toolbox"><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li></ul><div class="clearfix"></div></div>
    <div class="x_content">
        <div class="col-md-12 col-sm-12  text-center">
            <ul class="pagination pagination-split">
                <li><a href="#">A</a></li>
                <li><a href="#">B</a></li>
                <li><a href="#">C</a></li>
                <li><a href="#">D</a></li>
                <li><a href="#">E</a></li>
                <li>...</li>
                <li><a href="#">W</a></li>
                <li><a href="#">X</a></li>
                <li><a href="#">Y</a></li>
                <li><a href="#">Z</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        @if(count($employeeData) == 0)
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Add your employees to this shift!</h4>
                <p>Aww no, you don't have any employees in this shifts. Add employees to countinue using TimeTracker!</p>
                <hr>
                <p class="mb-0">Got to <code>Add Employees</code> in your profile - Manage Accounts section to add all of your Employees</p>
            </div>
        @endif
        @foreach($employeeData as $employee)
            <div class="col-md-4 col-sm-4  profile_details">
                <div class="well profile_view">
                    <div class="col-sm-12">
                        <h4 class="brief"><i>{{$employee->position}}</i></h4>
                        <div class="left col-md-7 col-sm-7">
                            <h2><b> {{$employee->first_name}} {{$employee->last_name}} </b></h2>
                            <ul class="list-unstyled">
                                {{--             CORRECT ONE    <Li><i class="fa fa-building"></i> <strong>Branch: </strong> {{$branchData->name}}</li>--}}
                                <li><i class="fa fa-road"></i> <strong>Post Code: </strong> {{$employee->post_code}}</li>
                                <li><i class="fa fa-home"></i> <strong>Address 1: </strong> {{$employee->address_1}}</li>
                                <li><i class="fa fa-home"></i> <strong>Address 2: </strong>{{$employee->address_2}} </li>
                                <li><i class="fa fa-map"></i> <strong>City: </strong>{{\App\Models\City::getCityName($employee->city)}}</li>
                                <li><i class="fa fa-envelope"></i> <strong>Email: </strong>{{$employee->email}}</li>
                                <li><i class="fa fa-phone"></i> <strong>Phone: </strong>{{$employee->mobile_number}}</li>
                            </ul>
                        </div>
                        <div class="right col-md-5 col-sm-5 text-center">
                            <img src="{{ asset('images/profile/img.jpg')}}" alt="" class="img-circle img-fluid">
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
                            <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                            <a href="{{ URL::to('employee/' .$employee->id) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>
                            <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                            <a href="{{ URL::to('employee/' . $employee->id . '/edit') }}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-cogs"></i></button></a>
                            @if(Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3)
                                <x-button.remove/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if(Session::get('role_id') == 1 or Session::get('role_id') == 2 or Session::get('role_id') == 3)
    <div class="x_title">
        <div class="d-flex justify-content-center">
{{--            {{ $employeeData->links() }}--}}
        </div>
    </div>
@endif

