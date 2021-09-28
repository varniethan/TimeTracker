<div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#timeoff_categories" data-whatever="@getbootstrap">Add Expense Code</button>
    <div class="modal fade" id="timeoff_categories" tabindex="-1" role="dialog" aria-labelledby="timeoffCategoriesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeoffCategoriesLabel">Add Expense Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="uploadTab">
                            <form method="POST" action="{{url('expense_type')}}" class="form-horizontal form-label-left" id="openTab">
                                @csrf
                                <div class="row form-group row-margin-05">
                                    <div class="col-md-3">
                                        <label class="col-form-label text-left"><b>Name</b></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" id="recipient-name" name="name">
                                    </div>
                                </div>

                                <div class="row form-group row-margin-05">
                                    <div class="col-md-3">
                                        <label class="col-form-label text-left"><b>Notes - Description</b></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            <label for="exampleFormControlTextarea1">Add Reasons for why this leave might be taken, pay rate....etc</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="col-form-label text-left"><b>Pay Rate</b></label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class='input-group date'>
                                            <input type='text' class="form-control" name="pay_rate">
                                            <span class="input-group-addon">{{"$"}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_payed" value="1" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Is this paticular type of expense payed?</label>
                                </div>


                                <div class="modal-footer">
                                    <input type="submit" value="Save" class="btn btn-primary ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Code</th>
        <th scope="col">Description</th>
        <th scope="col">Basic Salary</th>
        <th scope="col">Overtime</th>
        <th scope="col">Status</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($expenseTypeData as $expenseType)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$expenseType->name}}</td>
            <td>{{$expenseType->description}}</td>
            <td>{{$expenseType->is_payed}}</td>
            <td>{{$expenseType->pay_rate}}</td>
            <td>{{$expenseType->status}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
