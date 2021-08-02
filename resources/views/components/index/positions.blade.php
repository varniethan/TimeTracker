<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-backdrop="static" data-target="#timeoff_categories" data-whatever="@getbootstrap">Add Positions Code</button>
    <div class="modal fade" id="timeoff_categories" tabindex="-1" role="dialog" aria-labelledby="timeoffCategoriesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeoffCategoriesLabel">Add Time Off Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('/positions')}}" class="form-horizontal form-label-left">
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
                            <label class="col-form-label col-md-3 col-sm-3" for="message-text">Basic Salary</label>
                            <input type="text" class="form-control col-md-6 col-sm-6" id="recipient-name" name="basic_salary">
                            <span class="color: red" >@error("name"){{$message}}@enderror</span>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label col-form-label col-md-3 col-sm-3">Pay Type</label>
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <select name="gender" id="inputState" class="form-control">
                                    <option name="pay_type" value="1">Fixed Amount</option>
                                    <option name="pay_type" value="2">Hourly</option>
                                    <option name="pay_type" value="3">No Pay</option>
                                    <span class="color: red" >@error("pay_type"){{$message}}@enderror</span>
                                </select>
                            </div>
                        </div>
                        <br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="overtime" value="" id="defaultCheck1">
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
        <th scope="col">Code</th>
        <th scope="col">Description</th>
        <th scope="col">Basic Salary</th>
        <th scope="col">Overtime</th>
        <th scope="col">Status</th>
        <th scope="col">Payment Type</th>
    </tr>
    </thead>
    <tbody>
    @foreach($positionData as $position)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$position['name']}}</td>
        <td>{{$position['description']}}</td>
        <td>{{$position['basic_salary']}}</td>
        <td>{{$position['overtime']}}</td>
        <td>{{$position['status']}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
