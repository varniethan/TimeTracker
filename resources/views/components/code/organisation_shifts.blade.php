<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#timeoff_categories" data-whatever="@getbootstrap">Add Organisation Shifts Code</button>
    <div class="modal fade" id="timeoff_categories" tabindex="-1" role="dialog" aria-labelledby="timeoffCategoriesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeoffCategoriesLabel">Add Organisation Shifts Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('/organisation_shifts')}}" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label col-md-3 col-sm-3" for="recipient-name"><b>Shift Name</b></label>
                            <input type="text" class="form-control col-md-6 col-sm-6" id="recipient-name" name="shift_name">
                            <span class="color: red" >@error("name"){{$message}}@enderror</span>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row form-group row-margin-05">
                            <div class="col-md-6">
                                <div class="col-md-2">
                                    <label class="col-form-label text-left"><b>From</b></label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker3'>
                                            <input type='text' class="form-control" name="start_time"/>
                                            <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-2">
                                    <label class="col-form-label text-left"><b>To</b></label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker4'>
                                            <input type='text' class="form-control" name="end_time"/>
                                            <span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label col-md-3 col-sm-3" for="message-text">Description</label>
                            <textarea type="text" class="form-control col-" id="recipient-name" name="description"></textarea>
                            <span class="color: red" >@error("name"){{$message}}@enderror</span>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-3">
                                <label class="col-form-label text-left"><b>No. of employees needed</b></label>
                            </div>
                            <div class="col-md-3">
                                <div class='input-group date'>
                                    <input type='text' class="form-control" name="number_of_employees_needed">
                                    <span class="input-group-addon">{{"Emplpyees"}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="exclude_from_over_time" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Exclude from overtime calculations</label>
                            <span class="color: red" >@error("overtime"){{$message}}@enderror</span>
                        </div>
                        <div class="modal-footer">
                            {{--                            <input type="submit" value="submit" class="btn btn-primary" data-dismiss="modal">Save</input>--}}
                            <input type="submit" value="Submit" class="btn btn-primary">
                            <button type="button" class="btn btn-success">Save and Add New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-button.remove/>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Shift Name</th>
        <th scope="col">Start time</th>
        <th scope="col">End time</th>
        <th scope="col">No of employees needeed</th>
        <th scope="col">View employees</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($organisationShiftsData as $organisationShifts)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$organisationShifts['shift_name']}}</td>
            <td>{{$organisationShifts['start_time']}}</td>
            <td>{{$organisationShifts['end_time']}}</td>
            <td>{{$organisationShifts['number_of_employees_needed']}}</td>
            <td><a href="{{ URL::to('/organisation_shifts/' .$organisationShifts->id) }}"><button type="button" class="btn btn-primary btn-md" disabled><i class="fa fa-eye"></i> See Employees Available</button></a></td>
            <td>
                <div class="col-sm emphasis">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ URL::to('/organisation_shifts/' .$organisationShifts->id) }}"><button type="button" class="btn btn-success btn-sm" disabled><i class="fa fa-eye"></i></button></a>
                        </div>
                        @if ((Session::get('role_id') == 1 or Session::get('role_id') == 2) and Session::has('org_id'))
                            <div class="col-md-2">
                                <form method="POST" action="/timeTracker/public/organisation_shifts/{{$organisationShifts->id}}">
                                    {{ method_field('Delete') }}
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>


            </td>
        </tr>
    @endforeach
    </tbody>
</table>
