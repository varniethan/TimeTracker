<div class="page-title">
    <div class="col-md-4">
        <div class="title_left"><h3>Pay Slip Generator</h3></div>
    </div>
    <div class="col-md-3">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-sucess') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
</div>


<div class="clearfix"></div>
<div class="x_panel">
    <div class="x_title">
        <h2>Pay Slips<small>Create payslips for your employee</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a class="dropdown-item" href="#">Settings 1</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Settings 2</a>
                    </li>
                </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />
        <div class="row row-margin-01">
            <h2>Select Employee - <small>which payslip do you want to see?</small></h2>
            <form method="post" action="{{url('/pay_slip_generate')}}">
                @csrf
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>Employee Name</b></label>
                </div>
                <div class="col-md-10">
                    <div class="col-md-6">
                        <select class="form-select" name="employee_id" id='employee_id' aria-label=".form-select-sm example">
                            @foreach($employeeData as $employee)
                                <option value='{{$employee->id}}'>{{$employee->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>Start Date</b></label>
                </div>
                <div class="col-md-10">
                    <div class="col-md-6">
                        <input type="date" name="start_date" id="date" class="form-control date" value="{{old('from_date')}}">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="col-form-label text-left"><b>End Date</b></label>
                </div>
                <div class="col-md-10">
                    <div class="col-md-6">
                        <input type="date" name="end_date"   id="date" class="form-control date" value="{{old('from_date')}}">
                    </div>
                </div>
                <button type="submit" id="shift_generate_button" class="btn btn-outline-primary">Generate Payslips</button>
            </form>
        </div>
    </div>
    <table id="shift_id" class="table table-striped">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Employee ID</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

