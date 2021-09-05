<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#timeoff_categories" data-whatever="@getbootstrap">Add Shifts Code</button>
    <div class="modal fade" id="timeoff_categories" tabindex="-1" role="dialog" aria-labelledby="timeoffCategoriesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeoffCategoriesLabel">Add Shift Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('/shift_designations')}}" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label col-md-3 col-sm-3" for="recipient-name">Name</label>
                            <input type="text" class="form-control col-md-6 col-sm-6" id="recipient-name" name="name">
                            <span class="color: red" >@error("name"){{$message}}@enderror</span>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="col-form-label col-md-3 col-sm-3" for="message-text">Description</label>
                            <textarea type="text" class="form-control col-" id="recipient-name" name="description"></textarea>
                            <span class="color: red" >@error("name"){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label col-form-label col-md-3 col-sm-3">Pay Type</label>
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <select name="pay_type" id="inputState" class="form-control">
                                    <option name="pay_type" value="1">Fixed Amount</option>
                                    <option name="pay_type" value="2">Hourly</option>
                                    <option name="pay_type" value="3">No Pay</option>
                                    <span class="color: red" >@error("pay_type"){{$message}}@enderror</span>
                                </select>
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
        <th scope="col">Code</th>
        <th scope="col">Description</th>
        <th scope="col">Pay Type</th>
        <th scope="col">Exclude From Over Time</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($shiftTypeData as $shiftType)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$shiftType['name']}}</td>
            <td>{{$shiftType['description']}}</td>
            <td>{{$shiftType['pay_type']}}</td>
            <td>{{$shiftType['exclude_from_over_time']}}</td>
            <td>{{$shiftType['status']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
