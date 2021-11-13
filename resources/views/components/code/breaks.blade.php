<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#timeoff_categories" data-whatever="@getbootstrap">Add Breaks Code</button>
    <div class="modal fade" id="timeoff_categories" tabindex="-1" role="dialog" aria-labelledby="timeoffCategoriesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeoffCategoriesLabel">Add Shift Break Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('/breaks')}}" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label col-md-3 col-sm-3" for="recipient-name"><b>Name</b></label>
                            <input type="text" class="form-control col-md-6 col-sm-6" id="recipient-name" name="name">
                            <span class="color: red" >@error("name"){{$message}}@enderror</span>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row form-group row-margin-05">
                            <div class="col-md-3">
                                <label class="col-form-label text-left" name="description"><b>Descriptions</b></label>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1">Add Reasons for break, paid....etc</label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label class="col-form-label text-left"><b>Time</b></label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker4'>
                                        <input type='text' class="form-control" name="hours"/>
                                        <span class="input-group-addon">{{"Hr"}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker4'>
                                        <input type='text' class="form-control" name="mins"/>
                                        <span class="input-group-addon">{{"Min"}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="row form-group row-margin-05">--}}
                        {{--                            <div class="col-md-3">--}}
                        {{--                                <label class="col-form-label text-left"><b>Break Code</b></label>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-7">--}}
                        {{--                                <select class="form-select" name='holiday_type_id' aria-label=".form-select-sm example">--}}
                        {{--                                    @foreach($breakTypeData as $breakType)--}}
                        {{--                                        <option value='{{$breakType->id}}'>{{$breakType->name}} </option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </select>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="can_end_earlier" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Can end earlier?</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="send_reminde" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Want to send reminder?</label>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label class="col-form-label text-left"><b>Prompt Time</b></label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker4'>
                                        <input type='text' class="form-control" name="prompt_when_hrs"/>
                                        <span class="input-group-addon">{{"Hr"}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker4'>
                                        <input type='text' class="form-control" name="prompt_when_mins"/>
                                        <span class="input-group-addon">{{"Min"}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label col-form-label col-md-3 col-sm-3"><b>Pay Type</b></label>
                            <div class="btn-group" data-toggle="buttons">
                                <select class="form-control" name='type' aria-label=".form-select-sm example">
                                    <option name="type" value="1">Fixed Amount</option>
                                    <option name="type" value="2">Hourly</option>
                                    <option name="type" value="3">No Pay</option>
                                    <span class="color: red" >@error("pay_type"){{$message}}@enderror</span>
                                </select>
                            </div>
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
        <th scope="col">Type</th>
        <th scope="col">Duration</th>
        <th scope="col">End Earlier</th>
        <th scope="col">Send Reminder</th>
        <th scope="col">Prompt Time</th>
    </tr>
    </thead>
    <tbody>
    @foreach($breakTypeData as $breakType)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$breakType->name}}</td>
            <td>{{$breakType->description}}</td>
            <td>{{$breakType->type}}</td>
            <td>{{$breakType->hours}}  {{$breakType->mins}}</td>
            <td>{{$breakType->can_end_earlier}}</td>
            <td>{{$breakType->send_reminder}}</td>
            <td>{{$breakType->prompt_when_hrs}} {{$breakType->prompt_when_mins}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
